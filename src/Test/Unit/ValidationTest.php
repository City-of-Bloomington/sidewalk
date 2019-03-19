<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Test\Unit;

use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    protected $service;

    public function setUp(): void
    {
        global $DI;
        $this->service = $DI->get('Domain\DataStorage\AddressService');
    }

    public function testJurisdictionValidation()
    {
        $this->assertTrue ($this->service->inCityLimits(['jurisdiction'=>'Bloomington']));
        $this->assertFalse($this->service->inCityLimits(['jurisdiction'=>'Stinesville']));
    }
}
