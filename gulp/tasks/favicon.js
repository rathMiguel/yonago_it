'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const favicon = require("gulp-favicons");

gulp.task('favicon', () => {
  gulp.src(`${config.path.input}images/${config.image.favicon}`)
  .pipe(favicon(config.favicon))
  .pipe(gulp.dest(`${config.path.output}favicons/`));
});
