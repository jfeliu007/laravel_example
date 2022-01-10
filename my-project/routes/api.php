<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/test", function(Request $request){
   $result =  (New App\Helpers\Connector\TradingViewConnector\AllTimeLowConnector(new \App\Helpers\Connector\TradingViewConnector\Adapter()))->getStockList();
//   return $result;
   return array_map(function(\App\Helpers\Connector\SymbolInfo $element) {
       return $element->toArray();
   }, $result);
});
