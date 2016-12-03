'use strict';

var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');

gulp.task('scripts', function () {
  gulp.src('dev/scripts/*.js')
  .pipe(uglify())
  .pipe(gulp.dest('public/scripts'));
});

gulp.task('styles', function () {
  gulp.src('dev/sass/style.scss')
  .pipe(sass())
  .pipe(autoprefixer({
    browsers: ['last 2 versions'],
    cascade: false
  }))
  .pipe(cleanCSS({compatibility: 'ie8'}))
  .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
  gulp.watch('dev/scripts/*.js', ['scripts']);
  gulp.watch('dev/sass/*.scss', ['styles']);
});

gulp.task('default', ['scripts', 'styles', 'watch']);
