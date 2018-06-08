'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const pug = require('gulp-pug');
const data = require('gulp-data');
const plumber  = require('gulp-plumber');
const notify = require("gulp-notify");

const browserSync = require('browser-sync');

const cache = require('gulp-cached');

gulp.task('pug', () => {
  return gulp.src([`${config.path.input}pug/**/*.pug`,`!${config.path.input}pug/**/_*.pug`])
    .pipe(cache('jaded'))
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(data((file) => {
      return config;
    }))
    .pipe(pug({
      pretty: true,
      basedir: `${config.path.input}pug/`
    }))
    .pipe(gulp.dest(config.path.dev))
    .pipe(browserSync.stream());
});