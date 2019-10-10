const mix = require('laravel-mix');

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

mix.react('resources/js/main.js', 'public/js/main')
    .react('resources/js/index.js', 'public/js/admin')
   .sass('resources/sass/app.scss', 'public/css/main')
    .copy('node_modules/semantic-ui-css/semantic.min.css','public/css/main/semantic.min.css')
   .sass('resources/sass/admin.scss', 'public/css/admin');

// mix.browserSync('baldininkams.test');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.jsx'],
    },
    module: {
        rules: [
            {
                test: /\.(jsx|js)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            '@babel/preset-env',
                            '@babel/preset-react'
                        ],
                        plugins: [
                            '@babel/plugin-syntax-dynamic-import',
                            '@babel/plugin-proposal-class-properties'
                        ]
                    }
                }
            },
        ]
    },

    });
