<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\DataStorage\Sidewalk;

use Domain\UseCases\Apply\Request as ApplyRequest;

interface SidewalkRepository
{
    /**
     * Look up whether a location is in the Community Development Block Grant
     */
    public function inCDBG(int $location_id): bool;

    /**
     * Save a new application and return the application_id
     */
    public function saveApplication(ApplyRequest $req): int;
}
