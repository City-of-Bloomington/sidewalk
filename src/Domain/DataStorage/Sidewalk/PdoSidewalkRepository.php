<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\DataStorage\Sidewalk;

use Domain\DataStorage\PdoRepository;
use Domain\UseCases\Apply\Request as ApplyRequest;

class PdoSidewalkRepository extends PdoRepository implements SidewalkRepository
{
    /**
     * Look up whether a location is in the Community Development Block Grant
     */
    public function inCDBG(int $location_id): bool
    {
        $sql    = "select cdbg_flag from census where location_id=? and cdbg_flag='Y'";
        $result = $this->doQuery($sql, [$location_id]);
        return $result ? true : false;
    }

    /**
     * Save a new application and return the application_id
     */
    public function saveApplication(ApplyRequest $req): int
    {
        $data   = [];
        $fields = [
            'address_id', 'address', 'firstname', 'lastname', 'email', 'phone'
        ];
        foreach ($fields as $f) {
            $data[$f] = !empty($req->$f) ? $req->$f : null;
        }
        $data['owned'   ] = $req->owned;
        $data['occupied'] = $req->occupied;

        return parent::saveToTable($data, 'applications');
    }
}
