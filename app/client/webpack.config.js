'use strict';
const NODE_ENV = process.env.NODE_ENV || 'development'; //Проверяем окружение, разработка или production
const webpack=require('webpack');
//Поодключаем наш модуль export
module.exports={
    entry: "./app/index.js", //Основной файл, где подключены все файлы. С него происходит сборка
    output: {
        filename: "./app/build/build.js", 
        library: '[name]'//Итоговый собранный файл
    },
    watch:NODE_ENV=='development', //следит за изменениями файлах и пересобирает пакет
    watchOptions:{
        aggregateTimeout:100 //ускоряет пересборку нашего проэкта
    },
     devtool:NODE_ENV=='development' ? "cheap-inline-module-source-map":null, //Это для production при разработке для удобной отладки
    //Подключаем плагины для WebPack
         plugins:[
                new webpack.DefinePlugin({
                    NODE_ENV: JSON.stringify(NODE_ENV),
                    LANG:JSON.stringify('ru')
            })
     ],
     resolve: {
        extensions: ['', '.js', '.jsx', '.css', 'scss'],
        modulesDirectories: [
          'node_modules'
        ]        
    },
    resolveLoader:{
        modulesDirectories: [ 'node_modules'] ,
        moduleTemplates:['*-loader','*'],
        extensions:['','.js']
    },
     module:{
        loaders:[
            {
            test:/\.js/,
            exclude: /(node_modules|bower_components)/,
            loader:'babel',
            query: {
      presets: ['es2015'],
    }
        }]
     },

};

if (NODE_ENV == 'prod') {*/
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        })
    )
}