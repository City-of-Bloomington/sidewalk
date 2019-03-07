"use strict";
/**
 * @copyright 2019 City of Bloomington, Indiana
 * @license https://www.gnu.org/licenses/agpl.txt, see LICENSE
 */
(function (window) {
    let resultsDiv = document.getElementById('searchResults'),
        results,    // Variable to store search result data
        callback,   // Function to call when once the user makes a choice
        chooserType,// Type of chooser (address | person | street )

        searchAddress = function (address) {
            let req = new XMLHttpRequest();

            resultsDiv.innerHTML = '<img src="' + BASE_URI + '/spinner.gif" />';

            req.addEventListener('load', resultsHandler);
            req.open('GET', ADDRESS_SERVICE + '/?format=json;queryType=address;query=' + address);
            req.send();
        },

        /**
         * Draws the search results into the modal div
         */
        resultsHandler = function (event) {
            results = [];

            try { results = JSON.parse(event.target.responseText); }
            catch (e) { resultsDiv.innerHTML = e.message; }

            if (results.length) {
                resultsDiv.innerHTML = '';
                resultsDiv.appendChild(resultsToHTML(results));
            }
            else {
                resultsDiv.innerHTML = 'No results found';
            }
        },

        /**
         * Creates the HTML for the search results
         *
         * Returns an Element node to ready to be appended to the DOM.
         * This creates an unordered list with eventListeners attached.
         *
         * Search results should come in as an array of objects.
         *
         * For each search result, we store the array index as a data
         * attribute.  Later on, you should be able to use that index
         * to pull the object data from the results variable.
         *
         * @param  array       Search result data
         * @return Element
         */
        resultsToHTML = function (results) {
            let ul = document.createElement('UL'),
                li;

            results.forEach(function (data, i, array) {
                li                 = document.createElement('LI');
                li.dataset.index   = i;
                li.innerHTML       = data.streetAddress;
                li.addEventListener('click', choose, false);
                ul.appendChild(li);
            });
            return ul;
        },

        /**
         * Handler for when a user chooses on of the results
         */
        choose = function (event) {
            document.location.href = BASE_URI + '?address_id=' + results[event.target.dataset.index].id;
        };
    document.getElementById('addressSearchForm').addEventListener('submit', function (e) {
        e.preventDefault();
        searchAddress(document.getElementById('addressQuery').value);
    }, false);
})(window);
