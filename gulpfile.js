const gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('autoprefixer')
    postcss = require('gulp-postcss'),
    cssnano = require('gulp-cssnano'),
    uglify = require('gulp-uglify');
    
//compile sass
gulp.task('sass', function() {
    return gulp.src('wp-content/themes/bubbo2020/src/scss/**/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('wp-content/themes/bubbo2020/dist/css/'))
});

//compile on save
gulp.task('watch', function() {
    gulp.watch('wp-content/themes/bubbo2020/src/scss/**/*.scss', gulp.series('sass'));
});


//minifies js
gulp.task('minify-js', function() {
   return gulp.src('wp-content/themes/bubbo2020/src/js/**/*.js')
   .pipe(uglify())
   .pipe(gulp.dest('wp-content/themes/bubbo2020/dist/js/'))
});

//minifies css
gulp.task('minify-css', function() {
    return gulp.src('wp-content/themes/bubbo2020/src/scss/**/*.scss')
    .pipe(sass())
    .pipe(postcss([ autoprefixer({
        overrideBrowserslist: ['last 2 versions'],
        cascade: false
    }) ]))
    .pipe(cssnano())
    .pipe(gulp.dest('wp-content/themes/bubbo2020/dist/css/'))
});

//builds everything
gulp.task('build', gulp.series('minify-css', 'minify-js', function(done) {
    console.log('Building and...all done!');
    done();
}));