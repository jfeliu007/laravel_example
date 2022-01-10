<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 8:28 AM
 */

namespace App\Helpers\Connector;

/**
 * Class AbstractSymbolSearchConnector
 * @package App\Helpers\Connector
 * Abstraction for Symbol search connectors.
 */
abstract class AbstractSymbolSearchConnector
{
    private $adapter;

    public function __construct(AbstractSymbolAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    abstract protected function gatherStockList();

    public function getStockList() {
        $result = [];
        foreach($this->gatherStockList() as $stockInfo) {
            $result[] = new SymbolInfo($this->adapter->convert($stockInfo));
        }
        return $result;
    }
}