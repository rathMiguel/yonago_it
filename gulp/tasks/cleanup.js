'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const del = require('del');

gulp.task('cleanup', (cb) => {
  del([`${config.path.output}**/*.map`,`${config.path.output}css/sg-options/`]);
});

gulp.task('reset', (cb) => {
  del([`${config.path.output}**/*`]);
});
