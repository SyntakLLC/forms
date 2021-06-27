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

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config')).version();

if (process.env.APP_ENV === 'production' || process.env.APP_ENV === 'demo'  || process.env.APP_ENV === "staging") {
    const ASSET_URL = process.env.ASSET_URL + "/";

    mix.webpackConfig(webpack => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    "process.env.ASSET_PATH": JSON.stringify(ASSET_URL)
                })
            ],
            output: {
                publicPath: ASSET_URL
            }
        };
    });
} else {
    mix.browserSync({
        proxy: 'https://forms.test',
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'packages/mixdinternet/frontend/src/**/*.php',
            'public/js/**/*.js',
            'public/css/**/*.css'
        ],
        host: '192.168.10.10',
        port: 3000,
        open: false,
        https: {
            key: '/etc/ssl/certs/forms.test.key',
            cert: '/etc/ssl/certs/forms.test.crt',
        },
        watchOptions: {
            usePolling: true,
            interval: 500,
        },
        notify: false
    });
}
