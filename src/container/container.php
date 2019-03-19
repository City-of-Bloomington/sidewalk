<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$DI = $builder->newInstance();

$conf = $DATABASES['default'];
$pdo  = new PDO("$conf[driver]:dbname=$conf[dbname];host=$conf[host]", $conf['username'], $conf['password'], $conf['options']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$platform = ucfirst($pdo->getAttribute(PDO::ATTR_DRIVER_NAME));

$DI->params[ 'Domain\DataStorage\Sidewalk\PdoSidewalkRepository']['pdo'] = $pdo;
$DI->set(    'Domain\DataStorage\Sidewalk\SidewalkRepository',
$DI->lazyNew('Domain\DataStorage\Sidewalk\PdoSidewalkRepository'));

$DI->params[ 'Web\Services\MasterAddressService']['base_url'] = ADDRESS_SERVICE;
$DI->params[ 'Web\Services\MasterAddressService']['city'    ] = CITY;
$DI->set(    'Domain\DataStorage\AddressService',
$DI->lazyNew('Web\Services\MasterAddressService'));


//---------------------------------------------------------
// Use Cases
//---------------------------------------------------------
foreach (['Apply', 'CheckQualifications'] as $a) {
    $DI->params[ "Domain\UseCases\\$a\Command"]["repository"    ] = $DI->lazyGet('Domain\DataStorage\Sidewalk\SidewalkRepository');
    $DI->params[ "Domain\UseCases\\$a\Command"]["addressService"] = $DI->lazyGet('Domain\DataStorage\AddressService');
    $DI->set(    "Domain\UseCases\\$a\Command",
    $DI->lazyNew("Domain\UseCases\\$a\Command"));
}
