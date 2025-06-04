<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class AdminUserController extends Controller
{
    /**
     * Manual check if the current user is admin.
     * Also checks if user is logged in.
     */
    protected function checkAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized.');
        }
    }

    /**
     * Display a listing of users with 'pending' status.
     */
    public function index()
    {
        $this->checkAdmin();

        $pendingUsers = User::where('status', 'pending')->get();

        return view('admin.users.pending', compact('pendingUsers'));
    }

    /**
     * Approve a user by setting status to 'approved'.
     */
    public function approve($id)
    {
        $this->checkAdmin();

        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully.');
    }

    /**
     * Delete a pending user.
     */
    public function destroy($id)
    {
        $this->checkAdmin();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function approved()
    {
        $this->checkAdmin();

        $approvedUsers = User::where('status', 'approved')->get();

        return view('admin.users.approved', compact('approvedUsers'));
    }

    public function exportApprovedPdf()
    {
        $this->checkAdmin();

        $approvedUsers = User::where('status', 'approved')->get();

        // Create a new mPDF instance
        $pdf = new Mpdf();

        // Load the view and pass approved users to it
        $pdf->WriteHTML(view('admin.users.approved_pdf', compact('approvedUsers'))->render());

        // Return PDF for download
        return $pdf->Output('approved_users.pdf', 'D');
    }


    /**
     * Export the list of pending users as PDF.
     */
    public function exportPdf()
{
    $this->checkAdmin();

    $pendingUsers = User::where('status', 'pending')->get();

    // Create a new mPDF instance
    $pdf = new Mpdf();

    // Load the view and pass pending users to it
    $pdf->WriteHTML(view('admin.users.pending_pdf', compact('pendingUsers'))->render());

    // Return PDF for download
    return $pdf->Output('pending_users.pdf', 'D');
}
}
