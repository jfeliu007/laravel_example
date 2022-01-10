<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 9:02 AM
 */

namespace App\Helpers\Connector\TradingViewConnector;


use App\Helpers\Connector\AbstractSymbolAdapter;

/**
 * Class AllTimeHighConnector
 * @package App\Helpers\Connector\TradingViewConnector
 * Connector to retrieve all time high symbols from TradingViewAllTimeHighConnector.php
 */
class AllTimeHighConnector extends TradeViewConnector
{
   public function __construct(AbstractSymbolAdapter $adapter)
   {
       parent::__construct($adapter);
       $this->payload['filter'][] =
       $this->payload['filter'][] =
           [
               'left' => 'Low.All',
               'operation' => 'eless',
               'right' => 'low',
           ] ;
   }
}