<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class itemController extends Controller
{
    public function master()
    {
        $items = Item::with('brand')->get();
        return view('items.master', ['items'=>$items]);
    }
}
