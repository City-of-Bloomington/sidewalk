<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Views;

use Domain\UseCases\Apply\Request;
use Domain\UseCases\Apply\Response;

use Web\Block;
use Web\Template;

class ApplyView extends Template
{
    public function __construct(Request $request, ?Response $response=null)
    {
        parent::__construct('default', 'html');
        $this->vars['title'] = 'Apply';

        $vars = isset($response->errors) ? ['errorMessages' => $response->errors] : [];

        foreach ((array)$request as $k=>$v) {
            $vars[$k] = parent::escape($v);
        }

        $this->blocks = [
            new Block('sidewalk/applyForm.inc', $vars)
        ];
    }
}
