// assets/js/app.js

require('../css/app.scss');

const $ = require('jquery');
require('bootstrap');

$('.dropdown-toggle').click(function(e) {
    if ($(document).width() > 768) {
        e.preventDefault();

        var url = $(this).attr('href');


        if (url !== '#') {

            window.location.href = url;
        }

    }
});

