<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\UseCases\CheckQualifications;

use Domain\DataStorage\AddressService;
use Domain\DataStorage\Sidewalk\SidewalkRepository;

class Command
{
    private $repo;
    private $service;

    public function __construct(SidewalkRepository $repository, AddressService $addressService)
    {
        $this->repo    = $repository;
        $this->service = $addressService;
    }

    public function __invoke(int $address_id): Response
    {
        $address = $this->service->address($address_id);
        if ($address) {
            $errors = [];

            if (!$this->service->inCityLimits($address)) {
                $errors[] = 'notInCityLimits';
            }

            if (!self::residentialSingleFamily($address)) {
                $errors[] = 'notResidentialSingleFamily';
            }

            $cdbg = $this->repo->inCDBG(self::location_id($address));
            if (!$cdbg) {
                $errors[] = 'notInCDBG';
            }

            return $errors
                ? new Response($address, false, $errors)
                : new Response($address, true);
        }

        return new Response(null, false, ['address/unknown']);
    }

    private static function residentialSingleFamily(array $address): bool
    {
        return (!empty($address['locationUseType']['location_code'])
                &&     $address['locationUseType']['location_code'] == 'RS');
    }

    private static function location_id(array $address): int
    {
        foreach ($address['locations'] as $l) {
            if ($l['active']) { return (int)$l['location_id']; }
        }
    }
}
