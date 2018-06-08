'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const browserSync = require('browser-sync').create();

gulp.task('serve', ['pug','sass','coffee'], () => {
  browserSync.init({
    notify: false,
    server: {
      baseDir: config.path.dev
    },
  });
  gulp.watch(`${config.path.input}scss/**/*.scss`, ['sass']);
  gulp.watch(`${config.path.input}pug/**/*.pug`, ['pug']);
  gulp.watch(`${config.path.input}coffee/**/*.coffee`, ['coffee']);
  gulp.watch(`${config.path.dev}**/*`).on('change', browserSync.reload);
});