<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Views;

use Web\Block;
use Web\Template;

use Domain\UseCases\CheckQualifications\Response;

class UnqualifiedView extends Template
{
    public function __construct(Response $response)
    {
        parent::__construct('default', 'html');

        $this->blocks = [
            new Block('sidewalk/notQualified.inc', [
                'address' => $response->address['streetAddress'],
                'reasons' => $response->errors
            ])
        ];
    }
}
