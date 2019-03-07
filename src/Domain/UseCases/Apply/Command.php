<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\UseCases\Apply;

use Domain\DataStorage\AddressService;
use Domain\DataStorage\Sidewalk\SidewalkRepository;

use Domain\UseCases\CheckQualifications\Command as CheckQualifications;

class Command
{
    private $repo;
    private $service;

    public function __construct(SidewalkRepository $repository, AddressService $addressService)
    {
        $this->repo    = $repository;
        $this->service = $addressService;
    }

    public function __invoke(Request $request): Response
    {
        $errors = self::validate($request);
        if ($errors) {
            return new Response(null, $errors);
        }

        $check = new CheckQualifications($this->repo, $this->service);

        $res   = $check($request->address_id);
        if (!$res->qualified) {
            return new Response(null, $errors);
        }

        try {
            $application_id = $this->repo->saveApplication($request);
            return new Response($application_id);
        }
        catch (\Exception $e) {
            return new Response(null, [$e->getMessage()]);
        }
    }

    private static function validate(Request $r): array
    {
        $errors = [];
        if (!$r->address_id || !$r->address) {
            $errors[] = 'address/unknown';
        }

        if (!$r->firstname || !$r->lastname) {
            $errors[] = 'missingContactInfo';
        }

        if (!$r->owned   ) { $errors[] = 'notOwner';    }
        if (!$r->occupied) { $errors[] = 'notOccupied'; }
        return $errors;
    }
}
