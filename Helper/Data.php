<?php

namespace Kruzhalin\TestTask\Helper;

/**
 * Class Data
 * @package Kruzhalin\TestTask\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const API_KEY = '';

    /**
     * @param        $amount
     * @param string $fromCurrency
     * @param string $toCurrency
     * @return string
     */
    function convertCurrency($amount, $fromCurrency = 'RUB', $toCurrency = 'PLN')
    {
        $apikey = self::API_KEY;

        $fromCurrency = urlencode($fromCurrency);
        $toCurrency   = urlencode($toCurrency);
        $query         = "{$fromCurrency}_{$toCurrency}";

        $json = file_get_contents("https://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=ultra");
        $obj  = json_decode($json, true);

        $val = floatval($obj["$query"]);

        $total = $val * $amount;
        return number_format($total, 2, '.', '');
    }
}
