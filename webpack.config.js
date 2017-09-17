'use strict';

const autoprefixer = require('autoprefixer');
const path = require('path');
const debug = process.env.NODE_ENV !== "production";
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');


module.exports = {
  context: __dirname,
  devtool: debug ? "inline-sourcemap" : false,
  entry: "./src/main.js",
  output: {
    path: __dirname + "/dist",
    filename: "bundle.min.js"
  },
  module:{
    rules:[
      // "url" loader works just like "file" loader but it also embeds
      // assets smaller than specified size as data URLs to avoid requests.
      {
        test: [/\.bmp$/, /\.gif$/, /\.jpe?g$/, /\.png$/],
        loader: require.resolve('url-loader'),
        options: {
          limit: 10000,
          name: 'dist/img/[name].[hash:8].[ext]',
        },
      },
      {
        test:/\.(js|jsx)$/,
        exclude:/(node_modules|bower_components)/,
        loader:'babel-loader'
      },
      {
        test:/\.scss$/,
        loader:ExtractTextPlugin.extract({
          fallback:'style-loader',
          use: [
            {
              loader:'css-loader',
              options: {
                minimize: true,
              }
            },
            {
              loader:'postcss-loader',
              options: {
                // Necessary for external CSS imports to work
                // https://github.com/facebookincubator/create-react-app/issues/2677
                ident: 'postcss',
                plugins: () => [
                  require('postcss-flexbugs-fixes'),
                  autoprefixer({
                    browsers: [
                      '>1%',
                      'last 4 versions',
                      'Firefox ESR',
                      'not ie < 9', // React doesn't support IE8 anyway
                    ],
                    flexbox: 'no-2009',
                  }),
                ],
              },
            },
            {
              loader: require.resolve('sass-loader'),
            },
          ]
        })
      },
      {
        test:/\.css$/,
        loader:ExtractTextPlugin.extract({
          fallback:'style-loader',
          use: [
            {
              loader:'css-loader',
              options: {
                minimize: true,
              }
            },
            {
              loader:'postcss-loader',
              options: {
                // Necessary for external CSS imports to work
                // https://github.com/facebookincubator/create-react-app/issues/2677
                ident: 'postcss',
                plugins: () => [
                  require('postcss-flexbugs-fixes'),
                  autoprefixer({
                    browsers: [
                      '>1%',
                      'last 4 versions',
                      'Firefox ESR',
                      'not ie < 9', // React doesn't support IE8 anyway
                    ],
                    flexbox: 'no-2009',
                  }),
                ],
              },
            },
          ]
        })
      },
    ],
  },
  plugins: debug ? [
    new ExtractTextPlugin({
      filename:"style.min.css",
    }),

  ] : [
    new webpack.optimize.UglifyJsPlugin({
      compress: {
        warnings: false,
        // Disabled because of an issue with Uglify breaking seemingly valid code:
        // https://github.com/facebookincubator/create-react-app/issues/2376
        // Pending further investigation:
        // https://github.com/mishoo/UglifyJS2/issues/2011
        comparisons: false,
      },
      output: {
        comments: false,
        // Turned on because emoji and regex is not minified properly using default
        // https://github.com/facebookincubator/create-react-app/issues/2488
        ascii_only: true,
      },
    }),
    new ExtractTextPlugin({
      filename:"style.min.css",
    }),
  ]
}
