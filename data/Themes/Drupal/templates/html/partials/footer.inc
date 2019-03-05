<footer>
    <div class="container">
        <div class="contactInfo">
            <dl><dt>Address</dt>
                <dd><address><a href="https://bloomington.in.gov/city/showers-city-hall">401 N Morton St
Bloomington IN 47404</a></address>
                </dd>
            </dl>
            <dl><dt>Phone</dt>
                <dd><a href="tel:812-349-3400" class="phone" title="Phone">(812)349-3400</a></dd>
            </dl>
        </div>
        <div class="contactInfo">
            <dl><dt>Facebook</dt>
                <dd><a href="https://www.facebook.com/cityofbloomington" class="facebook">Connect on Facebook</a></dd>
            </dl>
            <dl><dt>Twitter</dt>
                <dd><a href="http://twitter.com/citybloomington" class="twitter">Follow us on Twitter</a></dd>
            </dl>
        </div>
        <div>
            <nav>
                <a href="/departments/hr/jobs">City Jobs</a>
                <a href="https://bloomington.in.gov/subscribe">Subscribe to email lists</a>
                <a href="/web">Web Policy</a>
                <a href="https://bloomington.in.gov/ureport">Report A Problem</a>
                <a href="https://apps.bloomington.in.gov/kb">City Intranet</a>
                <a href="/">Home</a>
            </nav>
        </div>
    </div>
</footer>
<?php
	if (   isset($this->assets['scripts'])) {
		foreach ($this->assets['scripts'] as $url) {
			echo "<script type=\"text/javascript\" src=\"$url\"></script>\n";
		}
	}
	if (   isset($this->assets['stylesheets'])) {
		foreach ($this->assets['stylesheets'] as $url) {
			echo "<link rel=\"stylesheet\" href=\"$url\" />\n";
		}
	}
?>
