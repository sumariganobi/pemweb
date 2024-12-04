<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Log;

class ItemController extends Controller
{
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
        if($checkItem){
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Cannot update this item because it is linked to existing transactions.')->withErrors('Cannot update this item because it is linked to existing transactions.');
        }else{
            $item->update($request->all());
        }
    
        return redirect()->route('dashboard')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $checkItem = Transaction::where('item_id', $item['id'])->first();
        if($checkItem){
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Cannot delete this item because it is linked to existing transactions.')->withErrors('Cannot delete this item because it is linked to existing transactions.');
        }else{
            $item->delete();
        }
        
        return redirect()->route('dashboard')->with('success', 'Item deleted successfully.');
    }
}
