<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Services;

use Domain\DataStorage\AddressService;
use Web\Url;

class MasterAddressService implements AddressService
{
    public static $locationUseTypes = [
        'AG' => 'Agricultural',
        'SL' => 'Sub Location',
        'CM' => 'Commercial',
        'RS' => 'Residential Single Family',
        'ED' => 'Educational',
        'GV' => 'Government',
        'ID' => 'Industrial',
        'MD' => 'Medical',
        'MU' => 'Mixed Use',
        'IN' => 'Other Non-Profit or Institutional',
        'PR' => 'Property Parcel',
        'RG' => 'Religious',
        'TM' => 'Temporary',
        'UT' => 'Utility',
        'UK' => 'Unknown',
        'RM' => 'Residential Multi-Family',
        'R2' => 'Residential 2 Family',
        'AS' => 'Accessory Structure'
    ];

    private $base_url;
    private $city;

    public function __construct(string $base_url, string $city)
    {
        $this->base_url = $base_url;
        $this->city     = $city;
    }

    public function address(int $address_id): ?array
    {
        $url = $this->base_url."/addresses/viewAddress.php?format=json;address_id=$address_id";
        return self::jsonRequest($url);
    }

    public function inCityLimits(array $address): bool
    {
        return $address['jurisdiction'] == $this->city;
    }

    private static function jsonRequest($url): ?array
    {
        $response = Url::get($url);
        if ($response) {
            return json_decode($response, true);
        }
    }
}
