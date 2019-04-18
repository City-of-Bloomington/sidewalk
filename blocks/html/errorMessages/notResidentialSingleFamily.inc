<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 * @param array  $this->address
 * @param array  $this->reasons  Why they are not qualified
 */
declare (strict_types=1);
use Web\Services\MasterAddressService as Address;

$type = Address::$locationUseTypes[$this->address['locationUseType']['location_code']];
?>
<h2><?= $type; ?></h1>
<p> This program is specifically designed only for single family,
    owner occupied residential properties within the City of Bloomington. At this time
    <?= strtolower($type); ?> properties do not qualify. Please contact the Public Works Department at
    <a href="tel:+18123493410">(812) 349-3410</a> if you have any questions.
</p>
