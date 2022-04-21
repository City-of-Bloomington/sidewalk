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
    <p> Per city code, property owners are responsible for the maintenance and
        repair of sidewalks that are adjacent to their property.
    </p>
    <p> The purpose of this program is to make funds available for City of Bloomington
        owner occupied residential properties within designated areas to complete the
        repair of their adjacent sidewalk.
    </p>
    <p>This program is a partnership between the City of Bloomington,
        its residents, and vetted local contractors.
    </p>

    <h2>Requirements</h2>
    <p> To qualify, property owners must meet the following requirements:</p>
    <ul><li>The property must be a single-family, owner-occupied property
            located within the City of Bloomington corporate limits.
        </li>
        <li>The property must be located within a designated federal Community
            Development Block Grant boundary area.
            <div><a class="button" href="https://bloomington.in.gov/gisdata/mapgallery/CityServices-Operations/Sidewalks/SidewalkParticipationProgramEP.pdf">
                    View Boundary Map
                </a>
            </div>
        </li>
        <li>The applicant must have owned and occupied the property prior to
            application submission.
        </li>
        <li>Property taxes must be current at the time of application, or the
            property owner must be on a verifiable payment plan with the Monroe
            County Clerk’s Office.
        </li>
        <li>Property owners must not be delinquent on taxes or other debt owed
            to the City of Bloomington.
        </li>
        <li>The sidewalk must have a condition rating of “poor”, which will be
            verified by City staff upon application submission.
        </li>
    </ul>

    <h2>How to apply</h2>
    <p> Enter your address below in the search box and press the green search button.
        If your property is located within a federal Community Development
        Block Grant area, click on the confirmation address to access the
        application form.
    </p>
    <p> Please complete the application and submit online or in person to the
        Public Works Department located at
        <address>401 N Morton St. Rm#120
Bloomington, IN 47404</address>
    </p>
    <p> <strong>If an application form does not appear you do not meet one or more of
        the program’s eligibility requirements.</strong>
    </p>
    <p> Public Works Department staff will determine eligibility,
        tax status, and sidewalk rating based on city records. Applicants will
        be contacted at staff’s earliest convenience regarding their sidewalk’s
        status. This program is on a first come, first serve basis.
    </p>

    <h2>Questions</h2>
    <p> If you have any questions or need assistance with completing the
        application, please call the Public Works Department at
        <a href="tel:+18123493410">812-349-3410</a>, or email
        <a href="mailto:public.works@bloomington.in.gov">public.works@bloomington.in.gov</a>.
    </p>
    <form method="get" id="addressSearchForm">
        <fieldset><legend>Enter your address below for program eligibility</legend>
            <div>
                <label for="addressQuery">Address</label>
                <input name="addressQuery" id="addressQuery" />
            </div>
            <button type="submit" class="search">Search</button>
            <div id="searchResults"></div>
        </fieldset>
    </form>
</section>
