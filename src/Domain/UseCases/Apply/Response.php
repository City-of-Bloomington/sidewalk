<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\UseCases\Apply;

class Response
{
    public $application_id;
    public $errors;

    public function __construct(?int $application_id=null, ?array $errors=null)
    {
        $this->application_id = $application_id;
        $this->errors         = $errors;
    }
}
