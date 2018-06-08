'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const imagemin = require('gulp-imagemin');

gulp.task('imagemin', () => {
  return gulp.src(`${config.path.input}images/${config.image.main}**/*.+(jpg|jpeg|png|gif|svg)`)
    .pipe(imagemin({optimizationLevel: 7, }))
    .pipe(gulp.dest(`${config.path.dev}images/`));
});