var _ = require('lodash'),
    path = require('path');

var dev = {
    entries: {
        app: ['src/scss/app.scss', 'src/js/app.js']
    },
    webpack: {
        resolve: {
            modules: [
                path.resolve(__dirname, 'node_modules')
            ]
        },
        watchOptions: {
            ignored: /node_modules/
        }
    }
};

var prod = _.merge({}, dev, {
    eslint: false,
    stylelint: false,
    js: {
        uglify: true
    },
    sass: {
        filename: '[name].[contenthash].css'
    },
    css: {
        loaderOptions: {
            minimize: true
        }
    },
    webpack: {
        output: {
            filename: '[name].[hash].js'
        }
    }
});

module.exports = {
    dev: dev,
    docker: _.merge({}, dev, {
        webpack: {
            watchOptions: {
                poll: true
            }
        }
    }),
    prod: prod,
    staging: prod,
    test: prod
};
