'use strict';

const gulp = require('gulp');
const config = require('../config').config;

const inject = require('gulp-inject');
const bowerFiles = require('main-bower-files');
const concat = require('gulp-concat');

const filter = require('gulp-filter');

gulp.task('bower:insert', () => {
  gulp.src(`${config.path.input}scss/style.scss`)
  .pipe(inject(
      gulp.src(bowerFiles(),{
        read: false,
        }),{
          starttag: '// inject:{{ext}}',
          endtag:   '// endinject',
          relative: true,
          transform: (filepath) => {
            return `@import "${filepath}";`;
        },
      }
    )
  )
  .pipe(gulp.dest(`${config.path.input}scss/`));
});

gulp.task('bower:concat', () => {
  let jsFilter = filter(['**/*.js']);
  let cssFilter = filter(['**/*.css']);

  gulp.src(bowerFiles({
      debugging: true
  }))
  .pipe(jsFilter)
  .pipe(concat('vendor.js'))
  .pipe(gulp.dest(`${config.path.dev + config.path.js}`));

  gulp.src(bowerFiles({
      debugging: true
  }))
  .pipe(cssFilter)
  .pipe(concat('vendor.css'))
  .pipe(gulp.dest(`${config.path.dev + config.path.css}`))
});

gulp.task('bower:copy', () => {
  let fontFilter = filter(['**/*.eot', '**/*.otf', '**/*.svg', '**/*.ttf', '**/*.otf']);

  gulp.src(bowerFiles({
      debugging: true
  }))
  .pipe(fontFilter)
  .pipe(gulp.dest(`${config.path.dev + config.path.fonts}`))

});

gulp.task('bower', ['bower:insert', 'bower:concat', 'bower:copy']);