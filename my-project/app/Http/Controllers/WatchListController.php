<?php

namespace App\Http\Controllers;

use App\Models\Symbol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WatchListController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function store(Symbol $symbol) {
        return auth()->user()->watching()->toggle($symbol);
    }

    public function show() {
        $symbols = auth()->user()->watching;
        $watchesSymbols = auth()->user()->watching;
        $watching = [];
        foreach ($watchesSymbols as $symbol) {
            $watching[$symbol->id] = true;
        }
        return view("watch", compact("symbols","watching"));
    }
}
