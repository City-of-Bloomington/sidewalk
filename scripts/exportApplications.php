<?php
/**
 * @copyright 2021 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
include '../bootstrap.inc';

$csv   = fopen(SITE_HOME.'/applications.csv', 'w');
$query = $pdo->query('select * from applications');
foreach ($query->fetchAll(\PDO::FETCH_ASSOC) as $row) {
    fputcsv($csv, $row);
}
fclose($csv);
