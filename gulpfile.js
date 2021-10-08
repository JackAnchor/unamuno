// Modified filepath src/css/core/ in return AND watch
// Remove core @charset declaration
// Specified Node-Sass as the compiler property
// Added gulp-imagemin plugin
// Created new gulp Task Gulp images
// Code vulnerability detected postcss-svgo > svgo > js-yaml
// Created src/img folder and dist/img folder for project


'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
sass.compiler = require('node-sass');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var replace = require('gulp-replace');

gulp.task('workflow', function () {
	return gulp.src('./src/css/core/**/*.scss')

	// Initialize sourcemaps before compilation starts
	.pipe(sourcemaps.init())

	// Compile with sass
	.pipe(sass().on('error', sass.logError))

	// Apply autoprefixes
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
		}))

	// Compile with cssnano
	.pipe(cssnano())

	// Remove @charset UTF-8
	.pipe(replace('@charset "UTF-8";', ''))

	// Add/write sourcemaps
	.pipe(sourcemaps.write('./'))

	// Update minified/concatenated CSS
	.pipe(gulp.dest('./dist/css/'))
	});

	gulp.task('default', function () {
  gulp.watch('./src/css/core/**/*.scss', gulp.series('workflow'));
});

// Image Optimizer
 gulp.task('images', () =>
    gulp.src('src/img/*')
         .pipe(imagemin())
         .pipe(gulp.dest('dist/img'))
 );
