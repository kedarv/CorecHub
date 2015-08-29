// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minify = require('gulp-minify-css');
var watch = require('gulp-watch');
// Compress
gulp.task('styles', function() {
  gulp.src(['public/css/*.css', '!public/css/dist.min.css'])
  .pipe(concat('dist.min.css'))
  .pipe(minify({keepBreaks:false}))
  .pipe(gulp.dest('public/css/', {overwrite: true}));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src(['public/js/*.js', '!public/js/dist.min.js'])
    .pipe(concat('dist.min.js'))
    .pipe(uglify())
  .pipe(gulp.dest('public/js/', {overwrite: true}));
});

gulp.task('watch', function() {
    gulp.watch('public/css/style.css', ['styles']);
});

// Default Task
gulp.task('default', ['styles', 'scripts', 'watch']);