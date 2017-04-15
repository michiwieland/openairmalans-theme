const gulp = require('gulp');

// script
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
// styles
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');

// configuration
const themePath = 'wp-content/themes/openairmalans';
const distPath = themePath + '/dist';
const assetPath = themePath + '/assets';

gulp.task(
  'default',
  [
    'compile-styles',
    'compile-scripts',
    'compile-fonts',
    'compile-images'
  ],
  function() {
    gulp.watch(assetPath + '/scss/**/*.scss',  ['compile-styles']);
    gulp.watch(assetPath + '/js/**/*.js',      ['compile-scripts']);
    gulp.watch(assetPath + '/fonts/**/*',      ['compile-fonts']);
    gulp.watch(assetPath + '/images/**/*',     ['compile-images']);
  }
);

// styles
gulp.task('compile-styles', function () {
  return (
    gulp.src([
      assetPath + '/scss/style.scss'
    ])
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
    }))
    .pipe(gulp.dest(themePath))
  );
});

gulp.task('optimize-styles', function () {
  return gulp.src(themePath + '/style.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest(themePath));
});

// scripts
gulp.task('compile-scripts', function () {
  return (
    gulp.src([
      assetPath + '/js/vendors/jquery-3.2.1.min.js',
      assetPath + '/js/script.js'
    ])
    .pipe(concat('script.js'))
    .pipe(gulp.dest(distPath + '/js'))
  );
});

gulp.task('optimize-scripts', function () {
  return gulp.src(distPath + '/js/script.js')
    .pipe(uglify())
    .pipe(gulp.dest(distPath + '/js/'));
});

// images
gulp.task('compile-images', function () {
  return gulp.src(assetPath + '/images/**/*')
    .pipe(gulp.dest(distPath + '/images'));
});

// Fonts
gulp.task('compile-fonts', function () {
  return gulp.src(assetPath + '/fonts/**/*')
    .pipe(gulp.dest(distPath + '/fonts'));
});
