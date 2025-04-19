<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $drivers = Driver::query()
            ->when($search && $filter, function ($query) use ($search, $filter) {
                return $query->where($filter, 'like', "%{$search}%");
            })
            ->orderBy('Name') // Make sure this is capitalized correctly based on your DB
            ->paginate(10);

        return view('drivers.index', compact('drivers', 'search', 'filter'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Age' => 'required',
            'Address' => 'required',
            'Contact_Number' => 'required',
            'Gender' => 'required',
            'License_number' => 'required',
            'Duty_hours' => 'required',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver created successfully.');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'Name' => 'required',
            'Age' => 'required',
            'Address' => 'required',
            'Contact_Number' => 'required',
            'Gender' => 'required',
            'License_number' => 'required',
            'Duty_hours' => 'required',
        ]);

        $driver->update($request->all());
        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully.');
    }
}