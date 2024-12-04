<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\GudangLocation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Log;

class GudangLocationController extends Controller
{
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
        $checkLocation = Transaction::where('location_id', $location['id'])->first();
        if($checkLocation){
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Cannot update this location because it is linked to existing transactions.')->withErrors('Cannot update this location because it is linked to existing transactions.');
        }else{
            $location->update($request->all());
        }
    
        return redirect()->route('dashboard')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = GudangLocation::findOrFail($id);
        $checkLocation = Transaction::where('location_id', $location['id'])->first();
        if($checkLocation){
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Cannot delete this location because it is linked to existing transactions.')->withErrors('Cannot delete this location because it is linked to existing transactions.');
        }else{
            $location->delete();
        }
        
        return redirect()->route('dashboard')->with('success', 'Location deleted successfully.');
    }
}
