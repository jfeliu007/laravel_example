<?php

namespace App\Http\Controllers;

use App\Helpers\Connector\Factory;
use App\Helpers\Connector\SymbolInfo;
use App\Helpers\Connector\TradingViewConnector\Adapter;
use App\Helpers\Connector\TradingViewConnector\AllTimeLowConnector;
use App\Models\Symbol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allTimeHigh() {

        $resultSymbols = Factory::getConnector("TradingViewAllTimeHigh")->getStockList();
        return $this->dashboard($resultSymbols, "All Time High");
    }

    public function allTimeLow() {

        $resultSymbols = Factory::getConnector("TradingViewAllTimeLow")->getStockList();
        return $this->dashboard($resultSymbols, "All Time Low");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function dashboard($symbols, $view)
    {
        $symbols = $this->processUnknownSymbols($symbols);
        $watchesSymbols = auth()->user()->watching;
        $watching = [];
        foreach ($watchesSymbols as $symbol) {
            $watching[$symbol->id] = true;
        }
        return view('dashboard', compact(["symbols", "watching", "view"]));
    }

    private function processUnknownSymbols($symbols) {
        $result = [];
        /** @var SymbolInfo $symbol */
        foreach($symbols as $symbol) {
            $data = Symbol::where("symbol", $symbol->getSymbol())->first();
            if (!$data) {
                $data = new Symbol();
                $data->symbol = $symbol->getSymbol();
                $data->name = $symbol->getName();
                $data->exchange = is_null($symbol->getExchange()) ? " N/A" : $symbol->getExchange();
                $data->industry = is_null($symbol->getIndustry()) ? "N/A" : $symbol->getIndustry();
                $data->save();
            }
            $result[] = $data;
        }
        return $result;
    }
}
