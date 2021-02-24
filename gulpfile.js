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
// var babel           = require('gulp-babel');
// var plumber         = require('gulp-plumber');
var psi             = require('psi');

// Development site URL
var SITE = 'http://localhost'

//  Assets source paths
var SOURCE = {
    scripts: './assets/scripts/',
    styles: './assets/styles/',
    images: './assets/images/',
    blocks: './blocks/',
};

//  Set local URL if using Browser-Sync
const LOCAL_URL = SITE;

//  SASS options
var SASS_config = {
    options: {
        outputStyle: 'nested',
        // Set this to true to compile SASS code without code.
        // No brackets will be harmed by phasers.
        indentedSyntax: false
    },
    includes:{
        includePaths: [
            'node_modules/foundation-sites/scss',
            'node_modules/tailwindcss/',
            'node_modules/bootstrap/scss']
    }
};

var CSS_plugins = [
    cssnano(),
    precss(),
    autoprefixer(),
];

//  Styling tasks
gulp.task('styles:global', function () {
    return gulp.src(SOURCE.styles + '_scss/*.scss')
        .pipe(sass(SASS_config.includes))
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles));
});

gulp.task('styles:temp', function () {
    return gulp.src(SOURCE.styles + '_scss/templates/*.scss')  
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'templates'));
});

gulp.task('styles:admin', function () {
    return gulp.src(SOURCE.styles + '_scss/admin/*.scss')  
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'admin'));
});

gulp.task('styles:gutenberg', function () {
    return gulp.src(SOURCE.styles + '_scss/admin/*.scss')  
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'gutenberg'));
});


gulp.task('styles:part', function () {
    return gulp.src(SOURCE.styles + '_scss/templates/partials/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.styles + 'templates/partials'));
});

gulp.task('styles:block', function () {
    return gulp.src(SOURCE.blocks + '*/*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.blocks));
});

//  Scripts task
gulp.task('scripts:vendors', function () {
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

//  Watching Tasks
// --- watching files with BrowserSync
gulp.task('browsersync', function () {
    // --- list of watched files
    const files = [
        SOURCE.styles,
        SOURCE.blocks,
        SOURCE.scripts,
        SOURCE.images
    ];
    browserSync.init(files, {
        proxy: LOCAL_URL,
    });
    gulp.watch(SOURCE.styles + '_scss/*.scss', gulp.parallel('styles:global')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + '_scss/templates/*.scss', gulp.parallel('styles:temp')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + '_scss/templates/partials/*.scss', gulp.parallel('styles:part')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + '_scss/admin/*.scss', gulp.parallel('styles:admin')).on('change', browserSync.reload);
    gulp.watch(SOURCE.styles + '_scss/gutenberg/*.scss', gulp.parallel('styles:gutenberg')).on('change', browserSync.reload);
    gulp.watch(SOURCE.blocks + '**/*.scss', gulp.parallel('styles:block')).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts + 'vendors/*.js', gulp.series(
        gulp.parallel('scripts:vendors'),
    )).on('change', browserSync.reload);
    gulp.watch(SOURCE.scripts + 'theme.js', gulp.series(
        gulp.parallel('scripts:vendors'),
    )).on('change', browserSync.reload);
    // --- remove comment if you want BrowserSync to reload on image chages.
    // gulp.watch(SOURCE.images, gulp.parallel('images')).on('change', browserSync.reload);
});
// --- watching files without BrowserSync
gulp.task('watch', function () {
    // --- list of watched files
    gulp.watch(SOURCE.styles + '_scss/*.scss', gulp.parallel('styles:global'));
    gulp.watch(SOURCE.styles + '_scss/templates/*.scss', gulp.parallel('styles:temp'));
    gulp.watch(SOURCE.styles + '_scss/templates/partials/*.scss', gulp.parallel('styles:part'));
    gulp.watch(SOURCE.styles + '_scss/admin/*.scss', gulp.parallel('styles:admin'));
    gulp.watch(SOURCE.styles + '_scss/gutenberg/*.scss', gulp.parallel('styles:gutenberg'));
    gulp.watch(SOURCE.blocks + '**/*.scss', gulp.parallel('styles:block'));
    gulp.watch(SOURCE.scripts + 'vendors/*.js', gulp.parallel('scripts:vendors'));
    // --- remove comment if you want BrowserSync to reload on image chages.
    // gulp.watch(SOURCE.images, gulp.parallel('images'));
});

// Build Task
// --- to be done

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
            'styles:admin',
            'styles:gutenberg',
            'scripts:vendors'
        )
    )
);