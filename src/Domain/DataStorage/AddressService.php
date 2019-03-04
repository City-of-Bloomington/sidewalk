<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\DataStorage;

interface AddressService
{
    /**
     * Return address info
     */
    public function address(int $address_id): ?array;
}
