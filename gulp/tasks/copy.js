'use strict';

const gulp = require('gulp');
const config = require('../config').config;

gulp.task('copy', () => {
    return gulp.src([`${config.path.dev}**/*.+(html|jpg|jpeg|png|gif|svg|eot|otf|ttf|wotf|js)`])
    .pipe(gulp.dest(`${config.path.output}`));
});
