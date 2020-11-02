//   Packages
var autoprefixer    = require('autoprefixer');
var precss          = require('precss');
var browserSync     = require('browser-sync').create();
var cssnano         = require("cssnano");

//  Gulp
var gulp            = require('gulp');
var concat          = require('gulp-concat');
var imagemin        = require('gulp-imagemin');
var webp            = require('gulp-webp');
var postcss         = require('gulp-postcss');
var sass            = require('gulp-sass');
sass.compiler       = require('node-sass');
var uglify          = require('gulp-uglify');

//  Assets source paths
var SOURCE = {
    scripts: './assets/scripts/',
    styles: './assets/styles/',
    images: './assets/images/',
    blocks: './blocks/',
};

//  Set local URL if using Browser-Sync
const LOCAL_URL = '127.0.0.0';

//  SASS options
var SASS_config = {
    options: {
        outputStyle: 'nested',
        // Set this to true to compile SASS code without code.
        // No brackets will be harmed by phasers.
        indentedSyntax: false,
    }
};

var CSS_plugins = [
    cssnano(),
    precss(),
    autoprefixer(),
];

//  Styling tasks
gulp.task('styles:global', function () {
    return gulp.src(SOURCE.styles + 'scss/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles));
});

gulp.task('styles:temp', function () {
    return gulp.src(SOURCE.styles + 'scss/templates/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'templates'));
});

gulp.task('styles:part', function () {
    return gulp.src(SOURCE.styles + 'scss/templates/parts/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'templates/parts'));
});

gulp.task('styles:block', function () {
    return gulp.src(SOURCE.blocks + '*/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.blocks));
});

//  Scripts task
gulp.task('scripts', function () {
    return gulp.src(SOURCE.scripts + 'vendors/*.js')
        .pipe(concat('vendors.js'))
        .pipe(uglify())
        .pipe(gulp.dest(SOURCE.scripts));
});

//  Image task
gulp.task('images', function () {
    return gulp.src(SOURCE.images + 'pre/*')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.mozjpeg({quality: 50, progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(webp())
        .pipe(gulp.dest(SOURCE.images));
});

//  Browser Sync Task
//  --  watching files changes and update browser view
gulp.task('browsersync', function () {
//  ----  List of watched files
    const files = [
        SOURCE.php,
        SOURCE.styles,
        SOURCE.blocks,
        SOURCE.scripts,
    ];
    browserSync.init(files, {
        proxy: LOCAL_URL,
    });
    gulp.watch(SOURCE.styles + 'scss/*.scss', gulp.parallel('styles:global')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + 'scss/templates/*.scss', gulp.parallel('styles:temp')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + 'scss/templates/parts/*.scss', gulp.parallel('styles:part')).on('change', browserSync.reload);
    gulp.watch(SOURCE.blocks + '**/*.scss', gulp.parallel('styles:block')).on('change', browserSync.reload);
    gulp.watch(SOURCE.php).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts + 'vendors/*.js', gulp.series(
        gulp.parallel('scripts'),
    )).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts + 'theme.js', gulp.series(
        gulp.parallel('scripts'),
    )).on('change', browserSync.reload);
//  ----  Remove comment if you want BrowserSync to reload on image chages.
    // gulp.watch(SOURCE.images, gulp.parallel('images')).on('change', browserSync.reload);
});

//  Default Task
gulp.task('default',
    gulp.series(
        gulp.parallel(
            'images',
        ),
        gulp.parallel(
            'styles:global',
            'styles:temp',
            'styles:part',
            'styles:block',
            'scripts',
        )
    )
);