<?php
/**
 * @copyright 2019-2022 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Web\Controllers;

use Domain\UseCases\Apply\Request as ApplyRequest;

use Web\Controller as BaseController;
use Web\View;

use Web\Views\ApplyView;
use Web\Views\QualifyView;
use Web\Views\SuccessView;
use Web\Views\UnqualifiedView;

class ApplicationController extends BaseController
{
    public function apply(): View
    {
        $address_id = !empty($_REQUEST['address_id']) ? (int)$_REQUEST['address_id'] : null;

        if ($address_id) {
            if (!empty($_POST['address_id'])) {
                $apply    = $this->di->get('Domain\UseCases\Apply\Command');
                $request  = new ApplyRequest($_POST);
                $response = $apply($request);

                // If their request was saved
                if ($response->application_id) {
                    self::sendNotification($request);
                    return new SuccessView($response->application_id);
                }

                // There was something wrong with their request
                if ($request->address) {
                    return new ApplyView($request, $response);
                }
            }

            $check = $this->di->get('Domain\UseCases\CheckQualifications\Command');
            $res   = $check($address_id);

            if ($res->qualified && !isset($request)) {
                return new ApplyView(new ApplyRequest([
                    'address_id' => $res->address['address']['id'],
                    'address'    => $res->address['address']['streetAddress']
                ]));
            }
            return new UnqualifiedView($res);
        }
        return new QualifyView();
    }

    private static function sendNotification(ApplyRequest $request)
    {
        $to      = NOTIFICATION_EMAIL;
        $from    = 'From: '.APPLICATION_NAME.'@'.BASE_HOST;
        $subject = 'Sidewalk Repair Assistance Program';
        $message = json_encode($request, JSON_PRETTY_PRINT);

        mail($to, $subject, $message, $from);
    }
}
