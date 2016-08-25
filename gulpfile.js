var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    browserSync = require('browser-sync').create();

// Set paths for tasks
var paths = {
    html: ['*.php', '*.html'],
    scss: ['public/assets/sass/*.scss', 'public/assets/sass/**/*.scss']
};

// Extension filter for gulp-filter
var filterByExtension = function (extension) {
    return filter(function (file) {
        return file.path.match(new RegExp('.' + extension + '$'));
    });
};

gulp.task('scss', function () {
    gulp.src(paths.scss)
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('public/assets/css/.'))
        .once('error', function () {
            process.exit(1);
        })
        .once('end', function () {
            process.exit();
        });
    //.pipe(browserSync.stream());
});


gulp.task('watch', function () {
    gulp.watch(paths.scss, ['scss']);
    //gulp.watch(paths.html).on('change', browserSync.reload);
});

gulp.task('default', ['watch', 'scss']);