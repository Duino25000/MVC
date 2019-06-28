const path = require('path');

const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const devMode = process.env.MODE_ENV !== 'production';

module.exports = {
  entry: './assets/js/app.js',
  output: {
    path: path.resolve(__dirname, 'public/js'),
    filename: 'script.js'
  },

  module: {
  	rules:[{
  		test: /\.s?[ac]ss$/,
  		use: [
  			MiniCSSExtractPlugin.loader,
  			{loader: 'css-loader', options: { url: false, sourceMap : true}},
  			{loader: 'sass-loader', options: {sourceMap: true}}
  			]
  		},
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: "babel-loader"
      }]
  },
  devtool: 'source-map',
  plugins:[
  	new MiniCSSExtractPlugin({
  		filename: '../css/style.css'
  	})],

  mode : devMode ? 'development': 'production'
};