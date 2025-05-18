<?php

namespace App\Http\Controllers;

use App\Models\Schedule_Truck;
use App\Models\Driver;
use App\Models\Truck;
use Illuminate\Http\Request;
use PDF;

class ScheduleTruckController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $schedules = Schedule_Truck::with(['driver', 'truck'])
            ->when($search, function ($query, $search) {
                $query->whereHas('driver', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('truck', function ($q) use ($search) {
                    $q->where('plate_number', 'like', "%{$search}%");
                })->orWhere('cargo', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $search]);

        return view('schedule_trucks.index', compact('schedules', 'search'));
    }

    public function create()
    {
        $drivers = Driver::all();
        $trucks = Truck::all();
        return view('schedule_trucks.create', compact('drivers', 'trucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'truck_id' => 'required|exists:trucks,id',
            'cargo' => 'required|string',
            'status' => 'required|string',
        ]);

        Schedule_Truck::create($request->all());

        return redirect()->route('schedule_trucks.index')->with('success', 'Schedule created successfully.');
    }

    public function edit(Schedule_Truck $schedule_truck)
    {
        $drivers = Driver::all();
        $trucks = Truck::all();
        return view('schedule_trucks.edit', compact('schedule_truck', 'drivers', 'trucks'));
    }

    public function update(Request $request, Schedule_Truck $schedule_truck)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'truck_id' => 'required|exists:trucks,id',
            'cargo' => 'required|string',
            'status' => 'required|string',
        ]);

        $schedule_truck->update($request->all());

        return redirect()->route('schedule_trucks.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule_Truck $schedule_truck)
    {
        $schedule_truck->delete();
        return redirect()->route('schedule_trucks.index')->with('success', 'Schedule deleted successfully.');
    }

    public function exportPDF(Request $request)
    {
        $search = $request->input('search');

        $schedules = Schedule_Truck::with(['driver', 'truck'])
            ->when($search, function ($query, $search) {
                $query->whereHas('driver', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('truck', function ($q) use ($search) {
                    $q->where('plate_number', 'like', "%{$search}%");
                })->orWhere('cargo', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            })->get();

        $pdf = PDF::loadView('schedule_trucks.pdf', compact('schedules'));
        return $pdf->download('schedule_trucks.pdf');
    }
}
