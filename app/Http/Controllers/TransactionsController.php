<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Item;
use App\Models\GudangLocation;
use Illuminate\Http\Request;
use Log;

class TransactionsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'location_id' => 'required|exists:gudang_locations,id',
            'transaction_type' => 'required|in:income,outcome',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Transaction::create($request->all());

        return redirect()->back()->with('success', 'Transaction berhasil ditambahkan!.');
    }
}
