var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/build/')
    .setManifestKeyPrefix('build')

    .addEntry('app', './assets/js/app.js')
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .enableSassLoader(options => {
        options.implementation = require('sass');
    })

    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
