<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 9:10 AM
 */

namespace App\Helpers\Connector\TradingViewConnector;


use App\Helpers\Connector\AbstractSymbolAdapter;
use App\Helpers\Connector\SymbolInfo;

/**
 * Class Adapter
 * @package App\Helpers\Connector\TradingViewConnector
 * Allows conversion of data coming from the TradingViewHighConnector
 */
class Adapter extends AbstractSymbolAdapter
{

    function getFieldMapping()
    {
        return [
            SymbolInfo::SYMBOL => 0,
            SymbolInfo::NAME => 1,
            SymbolInfo::INDUSTRY => 2,
            SymbolInfo::EXCHANGE => 3
        ];
    }
}