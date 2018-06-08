'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const pleeease = require('gulp-pleeease');

gulp.task('css:optimize', () => {
    return gulp.src(`${config.path.dev + config.path.css}*.css`)
    .pipe(pleeease({
      minifier: false,
      autoprefixer: {
          browsers: config.prefix
      },
      mqpacker: ({
          sort: false
      }),
    }))
    .pipe(gulp.dest(`${config.path.output + config.path.css}`));
});
