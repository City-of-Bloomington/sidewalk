<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 * @param string $this->address
 * @param array  $this->reasons  Why they are not qualified
 */
declare (strict_types=1);
?>
<section>
    <header><h1>Not Qualified</h1></header>
    <p><?= $this->address; ?> does not qualify</p>

    <?php
        foreach ($this->reasons as $r) {
            $this->_include("errorMessages/$r.inc");
        }
    ?>
</section>
