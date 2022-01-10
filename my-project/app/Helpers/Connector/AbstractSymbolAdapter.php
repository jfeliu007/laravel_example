<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 8:45 AM
 */

namespace App\Helpers\Connector;

/**
 * Class AbstractSymbolAdapter
 * @package App\Helpers\Connector
 * Abstracts the conversion between results from the connectors and a SymbolInfo
 */
abstract class AbstractSymbolAdapter
{
    abstract function getFieldMapping();

    /**
     * Convert the symbol information from the connectors format to our standard format.
     * @param $symbolArray
     * @return array
     */
    public function convert($symbolArray) {
        $result = [];
        foreach($this->getFieldMapping() as $key => $value) {
            if(isset($symbolArray[$value])) {
                $result[$key] = $symbolArray[$value];
            }
        }
        return $result;
    }

}