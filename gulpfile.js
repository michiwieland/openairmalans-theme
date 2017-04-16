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
    'copy-precompiled-styles',
    'compile-scripts',
    'compile-fonts',
    'compile-images'
  ],
  function() {
    gulp.watch(assetPath + '/scss/**/*.scss',  ['compile-styles']);
    gulp.watch(assetPath + '/css/**/*.css',    ['copy-precompiled-styles']);
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
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest(themePath))
  );
});

// precompiled styles
gulp.task('copy-precompiled-styles', function () {
  return gulp.src(assetPath + '/css/**/*')
    .pipe(gulp.dest(distPath + '/css'));
});

// scripts
gulp.task('compile-scripts', function () {
  return (
    gulp.src([
      assetPath + '/js/vendors/jquery-3.2.1.min.js',
      assetPath + '/js/vendors/lity.js',
      assetPath + '/js/script.js'
    ])
    .pipe(concat('script.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(distPath + '/js'))
  );
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
