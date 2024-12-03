<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\GudangLocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function locationsContent()
    {
        $locations = GudangLocation::all();
        return view('partials.locations', compact('locations'));
    }
    public function itemsContent()
    {
        $items = Item::all();
        return view('partials.items', compact('items'));
    }
}
