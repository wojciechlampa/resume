// config file
var config = require('./config.json');

// gulp plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
var uglifycss = require('gulp-clean-css');
var uglifyjs = require('gulp-uglify');
var browsersync = require('browser-sync').create();
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var gulpif = require('gulp-if');

// task for browsersync integration
gulp.task('browsersync', function () {
    browsersync.init({
        open: config.browsersync.open,
        host: config.browsersync.host,
        proxy: config.browsersync.proxy,
        port: config.browsersync.port
    })
});


// task to compile sass files, concatenation and move into assets
// add to below object all scss you want include into website
gulp.task('css', function () {
    return gulp.src(
        config.paths.css.src
    )
        .pipe(gulpif(config.development, sourcemaps.init()))
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulpif(config.production, uglifycss()))
        .pipe(concat('main.css'))
        .pipe(gulpif(config.development, sourcemaps.write()))
        .pipe(gulp.dest(config.paths.css.dist))
        .pipe(browsersync.stream())
});

// task to concatenation JS files and move them into assets
// add to below object all js you want include into website
gulp.task('js', function () {
    return gulp.src(
        config.paths.js.src
    )
        .pipe(gulpif(config.development, sourcemaps.init()))
        .pipe(gulpif(config.production, uglifyjs()))
        .pipe(concat('script.js'))
        .pipe(gulpif(config.development, sourcemaps.write()))
        .pipe(gulp.dest(config.paths.js.dist))
        .pipe(browsersync.stream())
});

// task to copy images into assets and minify them
// add to below object all images you want include into website
gulp.task('images', function () {
    return gulp.src(
        config.paths.images.src
    )
        .pipe(imagemin(
            {
                interlaced: true,
                progressive: true,
                optimizationLevel: 5
            }
        ))
        .pipe(gulp.dest(config.paths.images.dist))
        .pipe(browsersync.stream())
});

// task to copy fonts into assets
// add to below object all fonts you want include into website
gulp.task('fonts', function () {
    return gulp.src(
        config.paths.fonts.src
    )
        .pipe(gulp.dest(config.paths.fonts.dist))
});

// watch scss files
gulp.task('watch', ['browsersync', 'css', 'js', 'fonts', 'images'], function () {
    gulp.watch(config.paths.watch.css, ['css']);
    gulp.watch(config.paths.watch.js, ['js']);
    gulp.watch(config.paths.watch.images, ['images']);
    gulp.watch(config.paths.watch.fonts, ['fonts']);
    gulp.watch(config.paths.watch.php, browsersync.reload);
});

gulp.task('default', ['css', 'js', 'fonts', 'images', 'watch']);