<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airports;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $airports = Airports::all();
        return view('flights.create', compact('airports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string|max:255',
            'departure_airport_id' => 'required|exists:airports,id',
            'destination_airport_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'status' => 'required|in:Scheduled,Delayed,Cancelled,Completed',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')
            ->with('success', 'Flight added successfully.');
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return view('flights.show', compact('flight'));
    }

    public function edit($id)
    {
        $flight = Flight::findOrFail($id);
        $airports = Airports::all();
        return view('flights.edit', compact('flight', 'airports'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'flight_number' => 'required|string|max:255',
            'departure_airport_id' => 'required|exists:airports,id',
            'destination_airport_id' => 'required|exists:airports,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'status' => 'required|in:Scheduled,Delayed,Cancelled,Completed',
        ]);

        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return redirect()->route('flights.index')
            ->with('success', 'Flight updated successfully.');
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->route('flights.index')
            ->with('success', 'Flight deleted successfully.');
    }
}
