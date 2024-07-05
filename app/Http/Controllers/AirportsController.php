<?php

namespace App\Http\Controllers;

use App\Models\Airports;
use App\Models\Flight;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function index()
    {
        $airports = Airports::all();
        return view('airports.index', compact('airports'));
    }

    public function create()
    {
        return view('airports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'max_amount_of_planes' => 'nullable|integer',
            'amount_of_planes' => 'nullable|integer',
        ]);

        Airports::create($request->all());

        return redirect()->route('airports.index')->with('success', 'Airport created successfully.');
    }

    public function show($id)
    {
        $airport = Airports::findOrFail($id);
        return view('airports.show', compact('airport'));
    }

    public function edit($id)
    {
        $airport = Airports::findOrFail($id);
        return view('airports.edit', compact('airport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'max_amount_of_planes' => 'nullable|integer',
            'amount_of_planes' => 'nullable|integer',
        ]);

        $airport = Airports::findOrFail($id);
        $airport->update($request->all());

        return redirect()->route('airports.index')->with('success', 'Airport updated successfully.');
    }

    public function destroy($id)
    {
        $airport = Airports::findOrFail($id);
        $airport->delete();

        return redirect()->route('airports.index')->with('success', 'Airport deleted successfully.');
    }

    public function flights($id)
    {
        $airport = Airports::findOrFail($id);
        $flights = Flight::where('departure_airport_id', $airport->id)
            ->orWhere('destination_airport_id', $airport->id)
            ->get();
        return view('airport_flights', compact('flights', 'airport'));
    }

}
