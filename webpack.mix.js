const mix = require("laravel-mix");

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel applications. By default, we are compiling the CSS
| file for the application as well as bundling up all the JS files.
|
*/

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);

mix.postCss(
    "resources/css/eventOrganizer/myEvents.css",
    "public/css/eventOrganizer",
    []
);
mix.postCss(
    "resources/css/eventOrganizer/eventDetail.css",
    "public/css/eventOrganizer",
    []
);
mix.postCss(
    "resources/css/eventOrganizer/editEvent.css",
    "public/css/eventOrganizer",
    []
);

mix.postCss(
    "resources/css/layouts/eventOrganizerApp.css",
    "public/CSS/layouts"
);

mix.browserSync("127.0.0.1:3000");
