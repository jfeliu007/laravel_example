<?php
/**
 * Created by PhpStorm.
 * User: jfeliu
 * Date: 1/10/22
 * Time: 12:45 PM
 */

namespace App\Helpers\Connector\TradingViewConnector;


use App\Helpers\Connector\AbstractSymbolSearchConnector;
use Illuminate\Support\Facades\Http;

class TradeViewConnector extends AbstractSymbolSearchConnector
{
    const url = "https://scanner.tradingview.com/america/scan";
    protected $payload = [
        'filter' => [
            [
                'left' => 'name',
                'operation' => 'nempty',
            ],
            [
                'left' => 'type',
                'operation' => 'in_range',
                'right' => [
                    'stock',
                    'dr',
                    'fund',
                ],
            ],
            [
                'left' => 'subtype',
                'operation' => 'in_range',
                'right' => [
                    'common',
                    '',
                    'etf',
                    'unit',
                ],
            ]
        ],
        'symbols' => [
            'query' => [
                'types' => [
                    'stock',
                ],
            ],
        ],
        'columns' => [
            'name',
            'description',
            'industry',
            'exchange',
            'country',
            'volume',
        ],
        'sort' => [
            'sortBy' => 'name',
            'sortOrder' => 'asc',
        ],
        'options' => [
            'lang' => 'en',
        ],
    ];
    protected function gatherStockList()
    {
        $response = Http::post(self::url, $this->payload);
        if($response->ok()) {
            $responseResult = json_decode($response->body(), true);
            $result = [];

            if (key_exists("data", $responseResult)) {
                $result = [];
                foreach($responseResult['data'] as $item) {
                    if($item["d"][5] > 1000000) {
                        $result[] = $item['d'];
                    }
                }
                return $result;
            } else {
                throw new ConnectorException("incorrect data format from response");
            }

        } else {
            throw $response->toException();
        }
    }
}