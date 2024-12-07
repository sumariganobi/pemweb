<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GudangLocation;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function reportsContent()
    {
        $items = item::with('transaction')
        ->get()
        ->map(function($item){
            $income = $item->transactions()->where('transaction_type', 'income')->sum('quantity');
            $outcome = $item->transaction()->where('transaction_type', 'outcome')->sum('quantity');
            return[
                'name' => $item->name,
                'income' => $income,
                'outcome' => $outcome,
                'balance' => $income - $outcome,
            ];
        });
        return view('partials.reports', compact('items'));
    }
}