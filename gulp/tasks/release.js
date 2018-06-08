'use strict';

const gulp = require('gulp');

gulp.task('release', ['copy', 'minify', 'css:optimize']);