'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const coffee = require('gulp-coffee');
const plumber  = require('gulp-plumber');
const notify = require("gulp-notify");

const browserSync = require('browser-sync');

gulp.task('coffee', () => {
  return gulp.src(`${config.path.input}coffee/**/*.coffee`)
    .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
    .pipe(coffee({bare:true}))
    .pipe(gulp.dest(`${config.path.dev + config.path.js}`))
    .pipe(browserSync.stream());
});