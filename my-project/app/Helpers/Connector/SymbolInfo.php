<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 8:49 AM
 */

namespace App\Helpers\Connector;

/**
 * Class SymbolInfo
 * @package App\Helpers\Connector
 * Describes a symbol's information for a standarized used of symbols across connectors.
 */
class SymbolInfo
{
    const SYMBOL = "symbol";
    const NAME = "name";
    const INDUSTRY = "industry";
    const EXCHANGE = "exchange";
    private $symbol;
    private $name;
    private $industry;
    private $exchange;

    const map = [
        self::SYMBOL,
        self::NAME,
        self::INDUSTRY,
        self::EXCHANGE
    ];

    public function __construct($mappedArray) {
        foreach(self::map as $key) {
            $action = "set" . ucfirst($key);
            if(isset($mappedArray[$key])) {
                $this->$action($mappedArray[$key]);
            }
        }
    }

    /**
     * Returns an array representation of this Symbolnfo
     * @return array
     */
    public function toArray() {
        return [
            self::SYMBOL => $this->getSymbol(),
            self::NAME => $this->getName(),
            self::INDUSTRY => $this->getIndustry(),
            self::EXCHANGE => $this->getExchange()
        ];
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @param string $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }

    /**
     * @return string
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * @param string $exchange
     */
    public function setExchange($exchange)
    {
        $this->exchange = $exchange;
    }
}