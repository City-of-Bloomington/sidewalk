<?php
/**
 * @copyright 2022 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
include '../bootstrap.inc';

$fields = [
    'location_id',
    'geoid_10',
    'tract',
    'block_group',
    'block',
    'cdbg_flag'
];
$map     = function(string $f): string { return ":$f"; };
$columns = implode(',', $fields);
$params  = implode(',', array_map($map, $fields));
$insert  = $pdo->prepare("insert into census ($columns) values($params)");

$csv     = fopen('./census.csv', 'r');
while (($data = fgetcsv($csv)) !== false) {
    $insert->execute([
        'location_id' => $data[1],
        'geoid_10'    => $data[4],
        'tract'       => $data[2],
        'block_group' => $data[5],
        'block'       => $data[3],
        'cdbg_flag'   => $data[6]
    ]);
}
