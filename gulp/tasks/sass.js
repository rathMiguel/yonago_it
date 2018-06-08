'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const sass = require('gulp-sass');
const plumber  = require('gulp-plumber');
const notify = require("gulp-notify");

const sourcemaps = require('gulp-sourcemaps');

const browserSync = require('browser-sync');

gulp.task('sass', () => {
  return gulp.src([
    `${config.path.input}scss/**/*.scss`,
    `!${config.path.input}scss/sg-options/*.scss`
    ])
  .pipe(sourcemaps.init())
  .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
  .pipe(sass({
    outputStyle: 'expanded',
    sourcemap: true
  }))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest(`${config.path.dev + config.path.css}`))
  .pipe(browserSync.stream());
});
