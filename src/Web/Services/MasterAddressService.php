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
    private $base_url;

    public function __construct(string $base_url)
    {
        $this->base_url = $base_url;
    }

    public function address(int $address_id): ?array
    {
        $url = $this->base_url."/addresses/viewAddress.php?format=json;address_id=$address_id";
        return self::jsonRequest($url);
    }

    private static function jsonRequest($url): ?array
    {
        $response = Url::get($url);
        if ($response) {
            return json_decode($response, true);
        }
    }
}
