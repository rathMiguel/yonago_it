'use strict';

const gulp = require('gulp');
const config = require('../config').config;

gulp.task('copy:font', () => {
    return gulp.src([`${config.path.dev}**/*.+(eot|otf|ttf|wotf)`])
    .pipe(gulp.dest(`${config.path.output}`));
});

gulp.task('copy:image', () => {
    return gulp.src([`${config.path.dev}**/*.+(jpg|jpeg|png|gif|svg)`])
    .pipe(gulp.dest(`${config.path.output}`));
});

gulp.task('copy:js', ['coffee'], () => {
    return gulp.src([`${config.path.dev}**/*.+(js)`])
    .pipe(gulp.dest(`${config.path.output}`));
});

gulp.task('copy:html', () => {
    return gulp.src([`${config.path.dev}**/*.+(html)`])
    .pipe(gulp.dest(`${config.path.output}`));
});

gulp.task('copy', ['copy:font', 'copy:image', 'copy:js', 'copy:html']);