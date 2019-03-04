<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\UseCases\CheckQualifications;

class Response
{
    public $address   = [];
    public $qualified = false;
    public $errors    = [];

    public function __construct(?array $address=null, ?bool $qualified=false, ?array $errors=null)
    {
        $this->address   = $address;
        $this->qualified = $qualified;
        $this->errors    = $errors;
    }
}
