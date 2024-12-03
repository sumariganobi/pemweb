<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        // return response()->json($locations);
        return view('items/index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'item berhasil ditambahkan!.');
    }

    public function show($id)
    {
        return response()->json(Item::findOrFail($id));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $item = Item::findOrFail($id);
        $item->update($request->all());
    
        return redirect()->route('dashboard')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        
        return redirect()->route('dashboard')->with('success', 'Item deleted successfully.');
    }
}
