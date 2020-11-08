const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const browserSync = require('browser-sync').create();


// "BrowserSync"
//  ~ conenct to local proxy server and serve files via browser-sync
// gulp.task('browser-sync', function() {
//   browserSync.init({
//       proxy: "https://huntercox.local"
//   });
//   gulp.watch("./wp-content/themes/hsc2020/sass/**/*.scss").on("change", browserSync.reload);
// });


// "Styles"
//  ~ locate SASS files for the sass-compiler to read
//  ~ & choose where to write the compiled CSS files.
gulp.task('styles', () => {
  // gulp.src() READS, or 'streams', data from a source(s)
    return gulp.src('sass/**/*.scss')
        // pass, or 'pipe', the streamed data to the sass compiler
        .pipe(sass().on('error', sass.logError))
        // gulp.dest() WRITES data to the file system
        .pipe(gulp.dest('./css/'));
});


// "Clean"
//  ~ deletes the generated CSS file
gulp.task('clean', () => {
    return del([
        'css/main.css',
    ]);
});


// "Watch"
//  ~ automatically watches source for changes.
gulp.task('watch', () => {
  gulp.watch('sass/**/*.scss', (done) => {
      gulp.series(['clean', 'styles'])(done);
  });
});


// "Default"
//  ~ It runs the "Clean" & "Styles" tasks in sequential order.
//  ~ (...only runs if no task name is specified with Gulp CLI.)
gulp.task('default', gulp.series(['clean', 'styles']));


// ******************************************************
// Minify
// ******************************************************
// const minify = require("gulp-minify");
// function minifyjs() {
//   return src('src/js/main.js', { allowEmpty: true }) 
//       .pipe(minify({noSource: true}))
//       .pipe(dest('public/js'))
// }
// exports.default = minifyjs;
// ******************************************************