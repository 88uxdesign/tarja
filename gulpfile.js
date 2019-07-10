'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('brahman', function () {
  return gulp.src('assets/sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css/'));
});
