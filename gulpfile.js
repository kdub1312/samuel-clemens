var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('hello', function() {
    return new Promise(function(resolve, reject) {
        console.log("Hello Kevin");
        resolve();
      });
  });

  gulp.task('sass', function(){
    return gulp.src('scss/styles.scss')
      .pipe(sass()) // Using gulp-sass
      .pipe(gulp.dest('css/output/'))
  });

  gulp.task('watch', function(){
    //gulp 4.X watch syntax
    gulp.watch('scss/**/*.scss', gulp.series(['sass']));
  })