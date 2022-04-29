<?php
/**
 * @copyright 2019-2022 City of Bloomington, Indiana
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

            $location = $this->service::active_location($address);
            if ($location) {
                if (!self::residentialSingleFamily($location)) {
                    $errors[] = 'notResidentialSingleFamily';
                }

                if (!$this->repo->inCDBG($location['location_id'])) {
                    $errors[] = 'notInCDBG';
                }
            }
            else {
                $errors[] = 'retiredAddress';
            }

            return $errors
                ? new Response($address, false, $errors)
                : new Response($address, true);
        }

        return new Response(null, false, ['address/unknown']);
    }

    private static function residentialSingleFamily(array $location): bool
    {
        return (     !empty($location['type_code'])
                && in_array($location['type_code'], ['RS', 'UK']));
    }
}
