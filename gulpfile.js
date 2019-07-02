var gulp   = require('gulp');
		browserSync = require('browser-sync');
		// reload = browserSync.reload,
		autoprefixer = require('gulp-autoprefixer');
		concat = require('gulp-concat');
		imageMin = require('gulp-imagemin');
		minifyCSS = require('gulp-minify-css');
		notify = require('gulp-notify');
		plumber = require('gulp-plumber');
		sass = require('gulp-sass');
		sourcemaps = require('gulp-sourcemaps');
    uglify = require('gulp-uglify');
    livereload = require('gulp-livereload');
    $ = require('gulp-load-plugins');

// gulp.task('bs', function() {
// 	browserSync.init({
// 		proxy: 'soapboxhq.local',
// 	});
// });

gulp.task('styles', function() {
	return gulp.src('./gulp/scss/**/*.scss')
		.pipe(plumber({
		  errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(minifyCSS())
		.pipe(concat('style.css'))
		.pipe(autoprefixer('last 5 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest('./'))
    .pipe(livereload())
});

gulp.task('scripts', function () {
	return gulp.src('./gulp/**/*.js')
		.pipe(plumber({
		  errorHandler: notify.onError("Error: <%= error.message %>")
		}))
		.pipe(concat('main.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./assets'))
    .pipe(livereload())
});

// gulp.task('images', function () {
// 	return gulp.src('./images/**/*')
// 		.pipe(imageMin())
// 		.pipe(gulp.dest('./images'));
// });

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
  livereload.listen();

	gulp.watch('./gulp/scss/**/*.scss', gulp.parallel('styles'));
	gulp.watch('./gulp/js/scripts.js', gulp.parallel('scripts'));
});

gulp.task('default', gulp.series('styles', 'scripts', 'watch'));
