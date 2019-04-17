<!DOCTYPE html>
<?php $lang = strtolower(substr(LOCALE, 0, 2)); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang; ?>">
<?php
	$this->_include('partials/head.inc');
?>
<body>
<div class="dialog-off-canvas-main-canvas">
	<?php
		$this->_include('partials/header.inc');
	?>
	<main>
        <div id="banner"></div>
        <div id="breadcrumb">
            <div class="container">
                <section id="block-cob-breadcrumbs">
                    <div>
                        <nav role="navigation" aria-labelledby="system-breadcrumb">
                            <h2 id="system-breadcrumb" class="visually-hidden">Breadcrumb</h2>
                            <a href="/transportation">Getting Around Bloomington</a>
                            <a href="/transportation/sidewalks">Sidewalk Repair &amp; Maintenance</a>
                        </nav>

                    </div>
                </section>
                <section id="block-cob-page-title">
                    <div>
                        <h1><span><?= $this->title; ?></span></h1>
                    </div>
                </section>
            </div>
        </div>
        <div id="content">
            <div class="container">
                <section id="block-cob-cob-system-main">
                <?php
                    $this->_include('errorMessages.inc');
                    echo $this->includeBlocks();
                ?>
                </section>
            </div>
        </div>
	</main>
	<?php $this->_include('partials/footer.inc'); ?>
</div>
</body>
</html>
<?php
	$this->_include('partials/garbageCollection.inc');
?>
