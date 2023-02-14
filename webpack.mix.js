const mix = require('laravel-mix');

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

//mix.js('resources/js/app.js', 'public/js')
//    .postCss('resources/css/app.css', 'public/css', [
//        //
//    ]);

mix
        //Este comando junta três códigos distintos css em um único código no public depois de executar um (NPM RUN DEV).
        .styles(['resources/views/site/css/bootstrap.css', 'resources/views/site/css/style.css'], 'public/site/css/style.css')
        // Cópia pasta do resource e recria uma em public depois de executar um (NPM RUN DEV).     
        .styles(['resources/views/site/css/fontawesome.css'], 'public/site/css/fontawesome.css')

        .scripts(['resources/views/site/js/jquery.js'], 'public/site/js/jquery.js')

        .scripts(['resources/views/site/js/jquery.easing.js'], 'public/site/js/jquery-easing/jquery.easing.js')

        .scripts(['resources/views/site/js/bootstrap.bundle.js'], 'public/site/js/bootstrap.bundle.js')

        .scripts(['resources/views/site/js/sb-admin.js'], 'public/site/js/sb-admin.js')

        .scripts(['resources/views/site/js/chart.js'], 'public/site/js/chart.js')

        .scripts(['resources/views/site/js/grafico/chart-area-demo.js'], 'public/site/js/grafico/chart-area-demo.js')

        .scripts(['resources/views/site/js/grafico/chart-pie-demo.js'], 'public/site/js/grafico/chart-pie-demo.js')

        .version()

        .sourceMaps();