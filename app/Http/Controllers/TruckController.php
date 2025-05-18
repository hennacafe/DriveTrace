<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use PDF;

class TruckController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $trucks = Truck::when($search, function ($query, $search) {
            $query->where('Plate_number', 'like', "%{$search}%")
                  ->orWhere('Brand', 'like', "%{$search}%")
                  ->orWhere('Model', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
        })->latest()->paginate(5)->appends(['search' => $search]);

        return view('trucks.index', compact('trucks', 'search'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Plate_number' => 'required|string|unique:trucks',
            'Brand' => 'required|string',
            'Model' => 'required|string',
            'color' => 'required|string',
        ]);

        Truck::create($request->all());
        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }

    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'Plate_number' => 'required|string|unique:trucks,Plate_number,' . $truck->id,
            'Brand' => 'required|string',
            'Model' => 'required|string',
            'color' => 'required|string',
        ]);

        $truck->update($request->all());
        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully.');
    }

    public function exportPDF(Request $request)
    {
        $search = $request->input('search');
        $trucks = Truck::when($search, function ($query, $search) {
            $query->where('Plate_number', 'like', "%{$search}%")
                  ->orWhere('Brand', 'like', "%{$search}%")
                  ->orWhere('Model', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
        })->get();

        $pdf = PDF::loadView('trucks.pdf', compact('trucks'));
        return $pdf->download('trucks.pdf');
    }
}
