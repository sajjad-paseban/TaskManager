// webpack.mix.js

let mix = require('laravel-mix');
let fs = require('fs');
mix.browserSync('localhost/Task/public');


// -- js
fs.readdirSync('resources/js/').map((filename)=>{
    mix.js(`resources/js/${filename}`, 'public/dist/js/app.js');
})

// -- scss
fs.readdirSync('./resources/scss/').map((filename)=>{
    mix.sass(`resources/scss/${filename}`, 'public/dist/css/app.css');
})

