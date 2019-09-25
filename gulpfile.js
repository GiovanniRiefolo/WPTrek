// Gulp Packages
const   gulp        = require('gulp');
const   concat      = require('gulp-concat');
const   uglify      = require('gulp-uglify');
const   sass        = require('gulp-sass');
const   imagemin    = require('gulp-imagemin');
const   browserSync = require('browser-sync').create();

// Set local URL if using Browser-Sync
const   LOCAL_URL   = 'http://wp-trek.localhost/';
const   STYLE_DIR   = './assets/styles/';
const   SCRIPT_DIR   = './assets/scripts/';
const   IMAGES_DIR   = './assets/images/';

// SASS Options
const   SASS_config =   {
    options: {
        outputStyle: 'nested',
        // Set this to true to compile SASS code without code.
        // No brackets will be harmed by phasers.
        indentedSyntax: false,
    }
}

// Styles Task
gulp.task('styles', function(){
    return gulp.src(STYLE_DIR + 'scss/*.scss')
    .pipe(concat('global.scss'))
    .pipe(sass(SASS_config.options).on('error', sass.logError))
    .pipe(gulp.dest(STYLE_DIR));
});

// Scripts Task
gulp.task('scripts', function(){
    return gulp.src(SCRIPT_DIR + 'js/*.js')
    .pipe(concat('global.js'))
    .pipe(uglify())
    .pipe(gulp.dest(SCRIPT_DIR));
});

// Image Minification Task
gulp.task('imagemin', function(){
    return gulp.src(IMAGES_DIR + '*')
    .pipe(imagemin(
        // JPEG optimization @https://github.com/imagemin/imagemin-jpegtran
        imagemin.jpegtran({progressive: true}),
        // PNG optimization @https://github.com/imagemin/imagemin-optipng
        imagemin.optipng({optimizationLevel: 3}),
        // SVGo optimization @https://github.com/imagemin/imagemin-svgo
        imagemin.svgo({
            plugins:[
                // Full SVGo plugin list here @https://github.com/svg/svgo#what-it-can-do
                {removeViewBox: true},
                {cleanupIDs: false},
                {removeDesc: false},
                {minifyStyles: true}
            ]
        })
    ))
    .pipe(gulp.dest('IMAGES_DIR'));
});

// Default Task
gulp.task('default', gulp.parallel('styles', 'scripts', 'imagemin'));