const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var path = require('path');

// change these variables to fit your project
const jsPath= './js';
const cssPath = './css';
const outputPath = 'dist';
const localDomain = 'http://blog.loc';
const entryPoints = {
    'app': './assets/js/app.js',
    'style': './assets/scss/style.scss'
};
  
module.exports = {
  entry: entryPoints,
  mode: "production",
  devtool: false,
  output: {
    publicPath: '',
    path: path.resolve(__dirname, outputPath),
    filename: 'scripts/[name].js',
    clean: true,
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),

    // Uncomment this if you want to use CSS Live reload

    new BrowserSyncPlugin({
      proxy: localDomain,
      files: [ outputPath + '/*.css' ],
      injectCss: true,
    }, { reload: true, }),

  ],
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              sassOptions: { indentedSyntax: true },
            },
          },
        ],
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024',
      },
    ]
  },
};      