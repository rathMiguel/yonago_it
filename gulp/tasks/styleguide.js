'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const sass = require('gulp-sass');
const plumber  = require('gulp-plumber');
const notify = require("gulp-notify");

const styleguide = require('gulp-aigis');

const browserSync = require('browser-sync').create();

gulp.task('aigis', function() {
  return gulp.src('./aigis_config.yml')
    .pipe(styleguide())
    .pipe(browserSync.stream());
});

gulp.task('serve:aigis', ['aigis'], function() {
  let timer;
  browserSync.init({
    notify: false,
    server: {
      baseDir: config.path.styleguide,
      reloadDelay: 400
    },
  });
  gulp.watch(`${config.path.input}scss/**/*.scss`, ['sass']);
  gulp.watch(`${config.path.dev + config.path.css}**/*.css`, ['aigis']);
  gulp.watch(`${config.path.input}scss/**/*.scss`).on('change', () => {
    clearTimeout(timer);
    timer = setTimeout(function () {
      browserSync.reload();
    }, 400);
  });
});
