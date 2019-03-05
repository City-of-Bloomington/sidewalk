<?php
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE
 * @param int    $this->address_id
 * @param string $this->address
 */
declare (strict_types=1);
$this->template->addToAsset('scripts', BASE_URI.'/js/chooser.js');
?>
<section>
    <header><h1><?= $this->_('qualify'); ?></h1></header>
    <form method="get" id="addressSearchForm">
        <fieldset><legend>Search</legend>
            <div>
                <label for="addressQuery">Address</label>
                <input name="addressQuery" id="addressQuery" />
            </div>
            <button type="submit" class="search">Search</button>
            <div id="searchResults"></div>
        </fieldset>
    </form>
</section>
