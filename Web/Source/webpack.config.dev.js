'use strict';


const { VueLoaderPlugin } = require('vue-loader');


module.exports = 
    {
        mode: 'development',
        
        entry: 
        [
            './js/CloudyPlanet/app.js'
        ],
        
        output: 
        {
            filename: 'main.js',
            path: '/home/marinas/Dev/CloudyPlanet/Web/Public/resources'
        },
        
        module: 
        {
            rules: 
            [
                {
                    test: /\.vue$/,
                    use: 'vue-loader'
                }
            ]
        },
        
        plugins: 
        [
            new VueLoaderPlugin()
        ]
    };