'use strict';

const gulp = require('gulp');
const config = require('../config').config;

gulp.task('build', ['bower', 'pug', 'sass', 'coffee', 'imagemin']);