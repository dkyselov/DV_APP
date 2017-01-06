const NODE_ENV = process.env.NODE_ENV || 'development';
webpack = require('webpack');
path = require('path');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
webpackConfig = {
    context: __dirname + '/app', //Директория файлов 
    entry: {
        bundle: './index.js',
        styles: './style.scss'
    },
    output: {
        filename: '[name].js',
        path: './app/build',
        library: '[name]'
    },
    resolve: {
        extensions: ['', '.js', '.jsx']
    },
    devtool:NODE_ENV=='development' ? "cheap-inline-module-source-map":null,
    watch:NODE_ENV=='development', //следит за изменениями файлах и пересобирает пакет
	watchOptions:{
		aggregateTimeout:100 //ускоряет пересборку нашего проэкта
	},
	 resolveLoader:{
    	modulesDirectories: [ 'node_modules'] ,
    	moduleTemplates:['*-loader','*'],
    	extensions:['','.js']
    },
    module: {
        loaders: [
            {
                test: /\.jsx?$/,
                exclude: [/node_modules/],
                loader: "babel-loader",
                query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader!resolve-url!sass-loader?sourceMap')
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract('style-loader', 'css-loader')
            },
            {
                test: /\.woff2?$|\.ttf$|\.eot$|\.svg$|\.png|\.jpe?g|\.gif$/,
                loader: 'file-loader'
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('styles/style.css', {
            allChunks: true
        })
    ]
};
module.exports = webpackConfig;