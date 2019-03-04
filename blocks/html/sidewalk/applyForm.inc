<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 * @param int    $this->address_id;
 * @param string $this->address;
 * @param string $this->firstname;
 * @param string $this->lastname;
 * @param string $this->email;
 * @param string $this->phone;
 * @param bool   $this->owned;
 * @param bool   $this->occupied;
 *
 * @param array  $this->errorMessages
 */
declare (strict_types=1);
use Web\View;

?>
<section>
    <header><h1>Application for <?= $this->address; ?></h1></header>
    <?php
        if ($this->errorMessages) {
            $this->_include('errorMessages.inc');
        }
    ?>
    <form method="post">
        <fieldset>
            <input type="hidden" name="address_id" value="<?= $this->address_id; ?>" />
            <input type="hidden" name="address"    value="<?= $this->address;    ?>" />
            <?php
                $h = $this->template->getHelper('field');
                echo $h->field([
                    'name'     => 'firstname',
                    'id'       => 'firstname',
                    'label'    => $this->_('firstname'),
                    'value'    => $this->firstname,
                    'required' => true
                ]);
                echo $h->field([
                    'name'     => 'lastname',
                    'id'       => 'lastname',
                    'label'    => $this->_('lastname'),
                    'value'    => $this->lastname,
                    'required' => true
                ]);
                echo $h->field([
                    'name'     => 'email',
                    'id'       => 'email',
                    'label'    => $this->_('email'),
                    'type'     => 'email',
                    'value'    => $this->email,
                    'required' => true
                ]);
                echo $h->field([
                    'name'     => 'phone',
                    'id'       => 'phone',
                    'label'    => $this->_('phone'),
                    'type'     => 'tel',
                    'value'    => $this->phone,
                    'required' => true
                ]);
            ?>
        </fieldset>
        <fieldset>
            <?php
                $options = [
                    ['value'=>''],
                    ['value'=>1, 'label'=>$this->_('yes')],
                    ['value'=>0, 'label'=>$this->_('no' )]
                ];
                echo $h->field([
                    'name'     => 'owned',
                    'id'       => 'owned',
                    'label'    => $this->_('owned'),
                    'value'    => $this->owned ? 1 : 0,
                    'type'     => 'select',
                    'options'  => $options,
                    'required' => true
                ]);
                echo $h->field([
                    'name'     => 'occupied',
                    'id'       => 'occupied',
                    'label'    => $this->_('occupied'),
                    'value'    => $this->occupied ? 1 : 0,
                    'type'     => 'select',
                    'options'  => $options,
                    'required' => true
                ]);
            ?>
            <button type="submit"><?= $this->_('apply'); ?></button>
        </fieldset>
    </form>
</section>
