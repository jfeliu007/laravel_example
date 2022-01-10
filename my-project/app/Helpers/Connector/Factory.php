<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 11:19 AM
 */

namespace App\Helpers\Connector;


use App\Helpers\Connector\TradingViewConnector\Adapter;
use App\Helpers\Connector\TradingViewConnector\AllTimeHighConnector;
use App\Helpers\Connector\TradingViewConnector\AllTimeLowConnector;

/**
 * Class Factory
 * @package App\Helpers\Connector
 * Allows construction of the different connectors to be used to access stock market symbol data
 */
class Factory
{
    private static $connectors = [
        "TradingViewAllTimeHigh" => [
            "connector" => AllTimeHighConnector::class,
            "adapter" => Adapter::class
        ],
        "TradingViewAllTimeLow" => [
            "connector" => AllTimeLowConnector::class,
            "adapter" => Adapter::class
        ]
    ];

    /**
     * @param $connectorName
     * @return AbstractSymbolSearchConnector
     */
    public static function getConnector($connectorName) {
        if(!isset(self::$connectors[$connectorName])) {
            throw new ConnectorException("connector ".$connectorName." not found");
        }
        return new (self::$connectors[$connectorName]["connector"])(new (self::$connectors[$connectorName]["adapter"])());
    }
}