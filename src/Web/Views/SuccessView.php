<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Views;

use Web\Block;
use Web\Template;

class SuccessView extends Template
{
    public function __construct(int $application_id)
    {
        parent::__construct('default', 'html');
        $this->vars['title'] = 'Success';

        $this->blocks = [
            new Block('sidewalk/success.inc')
        ];
    }
}
