<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Views;

use Web\Block;
use Web\Template;

class QualifyView extends Template
{
    public function __construct(?int $address_id=null, ?string $address=null)
    {
        parent::__construct('default', 'html');
        $this->vars['title'] = $this->_('qualify');

        $this->blocks = [
            new Block('sidewalk/qualifyForm.inc', [
                'address_id' => $address_id,
                'address'    => $address
            ])
        ];
    }
}
