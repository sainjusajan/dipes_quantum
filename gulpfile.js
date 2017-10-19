var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var csso = require('gulp-csso');
var cleanCSS = require('gulp-clean-css');

gulp.task('scripts', function(){
    return gulp.src([
        './app/assets/vendors/viewport/jquery.viewport.js',
        './app/assets/vendors/easing/jquery.easing.1.3.js',
        './app/assets/vendors/simpleplaceholder/jquery.simpleplaceholder.js',
        './app/assets/vendors/fitvids/jquery.fitvids.js',
        './app/assets/vendors/animations/animate.js',
        './app/assets/vendors/superfish/hoverIntent.js',
        './app/assets/vendors/superfish/superfish.js',
        './app/assets/vendors/revolutionslider/js/jquery.themepunch.tools.min.js',
        './app/assets/vendors/revolutionslider/js/jquery.themepunch.revolution.min.js',
        './app/assets/vendors/bxslider/jquery.bxslider.min.js',
        './app/assets/vendors/magnificpopup/jquery.magnific-popup.min.js',
        './app/assets/vendors/isotope/imagesloaded.pkgd.min.js',
        './app/assets/vendors/isotope/isotope.pkgd.min.js',
        './app/assets/vendors/parallax/jquery.parallax.min.js',
        './app/assets/vendors/easypiechart/jquery.easypiechart.min.js',
        './app/assets/vendors/itplayer/jquery.mb.YTPlayer.js',
        './app/assets/vendors/easytabs/jquery.easytabs.min.js',
        './app/assets/vendors/jqueryvalidate/jquery.validate.min.js',
        './app/assets/vendors/jqueryform/jquery.form.min.js',
        './app/assets/vendors/gmap/jquery.gmap.min.js',
        './app/assets/vendors/twitter/twitterfetcher.js',
        './app/assets/js/main.js'
    ])
        .pipe(concat('script.js'))
        .pipe(gulp.dest('./app/assets/compressed/'))
});


gulp.task('styles', function() {
    return gulp.src([
        './app/assets/css/raw/reset.css',
        './app/assets/css/raw/grid.css',
        './app/assets/css/raw/elements.css',
        './app/assets/css/raw/layout.css',
        './app/assets/css/raw/components.css',
        './app/assets/css/raw/wordpress.css'

    ])
        .pipe(concat('compressed.css'))
        .pipe(gulp.dest('./app/assets/css/'));
});



//pipelining and combination of multiple functions in gulp default
gulp.task('allsass', function(){
    return gulp.src('./app/assets/scss/styles.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./app/assets/css/'));
});
gulp.task('alltask', function() {
    return gulp.src([
        './app/assets/css/raw/reset.css',
        './app/assets/css/raw/grid.css',
        './app/assets/css/raw/elements.css',
        './app/assets/css/raw/layout.css',
        './app/assets/css/raw/components.css',
        './app/assets/css/raw/wordpress.css'
    ])
    // .pipe(watch('./app/assets/frontend/css/*.css'))
        .pipe(concat('compressed.css'))
        .pipe(csso())
        .pipe(cleanCSS({
            compatibility: 'ie8'
        }))
        .pipe(gulp.dest('./app/assets/css/'));
});

gulp.task('watch', function() {
    gulp.watch(['./app/assets/css/raw/*.*', './app/assets/css/styles.css'], ['alltask']);
    gulp.watch('./app/assets/scss/*.scss', ['allsass']);
});

gulp.task('default', ['allsass', 'alltask', 'watch']);

