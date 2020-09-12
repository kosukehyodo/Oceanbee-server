const mix = require("laravel-mix");
require("dotenv").config(); 
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .autoload({
        jquery: ["$", "window.jQuery"],
        vue: ["Vue", "window.Vue"]
    })
    .sourceMaps(false)
    .version();

mix.sass("resources/sass/app.scss", "public/css")
    .version()
    .options({
        processCssUrls: false,
        postCss: [require("autoprefixer")()]
    })
    .copy(
        "node_modules/@fortawesome/fontawesome-free/webfonts",
        "public/webfonts"
);
    
