'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const pleeease = require('gulp-pleeease');
const concat = require('gulp-concat');

const uglify = require('gulp-uglify');

gulp.task('css:minify', ['css:optimize'], () => {
    return gulp.src([
      `${config.path.dev + config.path.css}vendor.css`,
      `${config.path.dev + config.path.css}*.css`
    ])
    .pipe(pleeease({
      minifier: true,
      autoprefixer: {
        browsers: config.prefix
      },
      mqpacker: ({
        sort: false
      }),
    }))
    .pipe(concat('style.min.css'))
    .pipe(gulp.dest(`${config.path.output + config.path.css}`));
});

gulp.task('js:minify', () => {
    return gulp.src([
      `${config.path.dev + config.path.js}vendor.js`,
      `${config.path.dev + config.path.js}*.js`
    ])
    .pipe(concat('script.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(`${config.path.output + config.path.js}`));
});

gulp.task('minify', ['css:minify','js:minify']);