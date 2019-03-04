<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 * @param int    $this->address_id
 * @param string $this->address
 */
declare (strict_types=1);
?>
<section>
    <header><h1><?= $this->_('qualify'); ?></h1></header>
    <form method="get">
        <fieldset>
        <?php
            $h = $this->template->getHelper('field');
            echo $h->field([
                'name'     => 'address_id',
                'id'       => 'address_id',
                'label'    => $this->_('address'),
                'value'    => $this->address_id,
                'type'     => 'chooser',
                'chooser'  => 'address',
                'display'  => $this->address,
                'required' => true
            ]);
        ?>
            <button type="submit">Check Qualifications</button>
        </fieldset>
    </form>
</section>
