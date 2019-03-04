<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 */
declare (strict_types=1);
namespace Domain\UseCases\Apply;

class Request
{
    public $address_id;
    public $address;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $owned;
    public $occupied;

    public function __construct(?array $data=null)
    {
        if (!empty($data['address_id'])) { $this->address_id = (int)$data['address_id']; }
        if (!empty($data['address'   ])) { $this->address    =      $data['address'   ]; }
        if (!empty($data['firstname' ])) { $this->firstname  =      $data['firstname' ]; }
        if (!empty($data['lastname'  ])) { $this->lastname   =      $data['lastname'  ]; }
        if (!empty($data['email'     ])) { $this->email      =      $data['email'     ]; }
        if (!empty($data['phone'     ])) { $this->phone      =      $data['phone'     ]; }

        $this->owned    = isset($data['owned'   ]) && $data['owned'   ];
        $this->occupied = isset($data['occupied']) && $data['occupied'];
    }
}
