<?php

namespace App\Http\Controllers;

use App\Models\GudangLocation;
use Illuminate\Http\Request;

class GudangLocationController extends Controller
{
    public function index()
    {
        $locations = GudangLocation::all();
        // return response()->json($locations);
        return view('locations/index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        GudangLocation::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Gudang berhasil ditambahkan!.');
    }

    public function show($id)
    {
        return response()->json(GudangLocation::findOrFail($id));
    }

    public function edit($id)
    {
        $location = GudangLocation::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $location = GudangLocation::findOrFail($id);
        $location->update($request->all());
    
        return redirect()->route('dashboard')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = GudangLocation::findOrFail($id);
        $location->delete();
        
        return redirect()->route('dashboard')->with('success', 'Item deleted successfully.');
    }
}
