# bubbo-theme 2020

## About
new Bubbowrap.com theme for 2020, built with Wordpress/Twig/ACF. Wanted to try out some new things, so what better way than a rebuild?

## Stack

### Built with:

- [wordpress](https://wordpress.org/)
- [npm](https://docs.npmjs.com/cli/install)
- [twig](https://twig.symfony.com)
- [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/API.md)


## Basic Commands

### NPM
 - `npm install` Install global assets/packages.

 - `npm update` Update & Install latest global assets/packages.

 - `npm cache clean` Update & Install latest global assets/packages.

### Gulp

##### Sass

 - `gulp sass` Force compile sass files 

 - `gulp watch` Monitor scss directory for changes and auto-compile


##### Optimization

 - `gulp minify-css` minify css files

 - `gulp minify-js` concat & minify js files

 - `gulp build` Runs all of the following commands: *sass, minify-css, minify-js*
