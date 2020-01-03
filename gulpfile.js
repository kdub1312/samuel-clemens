// Gulp.js configuration

const
  // modules
  gulp = require('gulp'),
  newer = require('gulp-newer'),
  imagemin = require('gulp-imagemin'),
  htmlclean = require('gulp-htmlclean'),
      
  // development mode?
//  devBuild = (process.env.NODE_ENV !== 'production'),

  concat = require('gulp-concat'),
  deporder = require('gulp-deporder'),
  terser = require('gulp-terser'),
  stripdebug = require('gulp-strip-debug'),
  sourcemaps = require('gulp-sourcemaps'),
  gulpless = require('gulp-less'),
  gulpautoprefixer = require('gulp-autoprefixer'),

  // folders
  src = 'src/',
  build = 'build/';

// image processing
function images() {

  const out = build + 'images/';

  return gulp.src(src + 'images/**/*')
    .pipe(newer(out))
    .pipe(gulp.dest(out));

};
exports.images = images;

// HTML processing
function html() {
  const out = build + 'html/';

  return gulp.src(src + 'html/**/*')
    .pipe(newer(out))
    .pipe(htmlclean())
    .pipe(gulp.dest(out));
}
exports.html = gulp.series(images, html);

// JavaScript processing
function js() {

  return gulp.src(src + 'js/**/*')
    .pipe(sourcemaps ? sourcemaps.init() : noop())
    .pipe(deporder())
    .pipe(concat('main.js'))
    .pipe(stripdebug ? stripdebug() : noop())
    .pipe(terser())
    .pipe(sourcemaps ? sourcemaps.write() : noop())
    .pipe(gulp.dest(build + 'js/'));

}
exports.js = js;

function styles() {
    
    return gulp.src(src + 'less/**/*')
    .pipe(gulpless())
    .pipe(gulpautoprefixer())
    .pipe(gulp.dest(build + 'css/'));
    
}
exports.styles = styles;