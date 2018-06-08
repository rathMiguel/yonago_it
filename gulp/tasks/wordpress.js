'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const changed = require('gulp-changed');
const browserSync = require('browser-sync').create();

gulp.task('copy:wptheme', () => {
  return gulp.src([`${config.path.output}**/*`, `!${config.path.output}**/*.html`], {base: config.path.output})
  .pipe(changed(`./themes/${config.path.wpTheme}`))
  .pipe(gulp.dest(`./themes/${config.path.wpTheme}`));
});

gulp.task('copy:wpstage', () => {
  return gulp.src(`./themes/**/*`)
  .pipe(changed(`${config.path.stage}wordpress/wp-content/themes/`))
  .pipe(gulp.dest(`${config.path.stage}wordpress/wp-content/themes/`));
});

gulp.task('wp', () => {
  let timer;

  browserSync.init({
    proxy: config.path.proxy,
    notify: false,
    ghostMode: false,
    reloadDelay: 200,
    once: true
  });

  gulp.watch([`${config.path.output}**/*`, `!${config.path.output}**/*.html`], [`copy:wptheme`]);
  gulp.watch(`${config.path.input}scss/**/*.scss`, [`css:optimize`]);
  gulp.watch(`${config.path.input}coffee/**/*.coffee`, [`copy:js`]);
  gulp.watch(`./themes/**/*`, [`copy:wpstage`]);

  gulp.watch(`${config.path.stage}wordpress/wp-content/themes/**/*`).on('change', () => {
    clearTimeout(timer);
    timer = setTimeout(function () {
      browserSync.reload();
    }, 200);
  });
});