//   Packages
var autoprefixer = require('autoprefixer');
var precss = require('precss');
var browserSync = require('browser-sync').create();
var cssnano = require("cssnano");

//  Gulp
const gulp = require('gulp');
const concat = require('gulp-concat');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');
const uglify = require('gulp-uglify');
// var babel = require('gulp-babel');
// var plumber = require('gulp-plumber');
const psi = require('psi');
const googleWebFonts = require('gulp-google-webfonts');

// Development site URL
const SITE = 'http://localhost'

//  Assets source paths
const SOURCE = require('../gulpfile.js/paths.json');

//  SASS options
const SASS_config = {
    options: {
        outputStyle: 'nested',
        // Set this to true to compile SASS code without code.
        // No brackets will be harmed by phasers.
        indentedSyntax: false
    },
    includes: {
        includePaths: [
            'node_modules/foundation-sites/scss',
            'node_modules/tailwindcss/',
            'node_modules/bootstrap/scss']
    }
};
const CSS_plugins = [
    cssnano(),
    precss(),
    autoprefixer(),
];

//  Styling tasks
gulp.task('styles:global', function () {
    return gulp.src(SOURCE.dir.scss.main + '*.scss')
        .pipe(sass(SASS_config.includes))
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.dir.dev.styles.main));
});

gulp.task('styles:templates', function () {
    return gulp.src(SOURCE.dir.scss.templates + '*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.dir.dev.styles.templates));
});

gulp.task('styles:admin', function () {
    return gulp.src(SOURCE.dir.scss.admin + '*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.dir.dev.styles.admin));
});

gulp.task('styles:editor', function () {
    return gulp.src(SOURCE.dir.scss.editor + '*.scss')
        .pipe(sass(SASS_config.options).on('error', sass.logError))
        .pipe(postcss(CSS_plugins))
        .pipe(gulp.dest(SOURCE.dir.dev.styles.editor));
});

//  Scripts task
gulp.task('scripts:vendors', function () {
    return gulp.src(SOURCE.dir.js.libraries + '*.js')
        .pipe(concat('vendors.js'))
        .pipe(uglify())
        .pipe(gulp.dest(SOURCE.dir.dev.scripts));
});

//  Image task
gulp.task('images', function () {
    return gulp.src(SOURCE.dir.images.raw + '*.*')
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
        .pipe(gulp.dest(SOURCE.dir.dev.images));
});

// Font task
const GFONTS_config = {
    fontsDir: 'assets/fonts/woff/',
    cssDir: 'assets/styles/',
    cssFilename: 'google-fonts.css',
    fontDisplayType: 'swap',
    relativePaths: true
};
gulp.task('fonts', function () {
    return gulp.src(SOURCE.files.fonts.list)
        .pipe(googleWebFonts(GFONTS_config))
        .pipe(gulp.dest(SOURCE.dir.dev.main));
})

//  Watching Tasks
// --- watching files with BrowserSync
//  Set local URL if using Browser-Sync
const LOCAL_URL = SITE;
gulp.task('browsersync', function () {
    browserSync.init({
        proxy: LOCAL_URL
    });
    gulp.watch(SOURCE.dir.scss.main + '*.scss', gulp.parallel('styles:global')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.scss.templates + '*.scss', gulp.parallel('styles:templates')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.scss.partials + '*.scss', gulp.parallel('styles:templates')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.scss.admin + '*.scss', gulp.parallel('styles:admin')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.scss.editor + '*.scss', gulp.parallel('styles:editor')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.js.libraries + '*.js', gulp.parallel('scripts:vendors')).on('change', browserSync.reload);
    gulp.watch(SOURCE.dir.dev.scripts + 'theme.js', gulp.parallel('scripts:vendors')).on('change', browserSync.reload);
    // --- remove comment if you want BrowserSync to reload on image chages.
    // gulp.watch(SOURCE.dir.images.raw + "*.*", gulp.parallel('images')).on('change', browserSync.reload);
});
// --- watching files without BrowserSync
gulp.task('watch', function () {
    // --- list of watched files
    gulp.watch(SOURCE.dir.scss.main + '*.scss', gulp.parallel('styles:global'));
    gulp.watch(SOURCE.dir.scss.templates + '*.scss', gulp.parallel('styles:templates'));
    gulp.watch(SOURCE.dir.scss.partials + '*.scss', gulp.parallel('styles:templates'));
    gulp.watch(SOURCE.dir.scss.admin + '*.scss', gulp.parallel('styles:admin'));
    gulp.watch(SOURCE.dir.scss.editor + '*.scss', gulp.parallel('styles:editor'));
    gulp.watch(SOURCE.dir.js.libraries + '*.js', gulp.parallel('scripts:vendors'));
    gulp.watch(SOURCE.dir.dev.scripts + 'theme.js', gulp.parallel('scripts:vendors'));
    // --- remove comment if you want BrowserSync to reload on image chages.
    // gulp.watch(SOURCE.dir.images.raw + "*.*", gulp.parallel('images'));
});

// Build Tasks
gulp.task('build:main', function () {
    return gulp.src(SOURCE.dir.dev.main + '*.php')
        .pipe(gulp.dest(SOURCE.dir.build.main));
});
gulp.task('build:main:styles', function () {
    return gulp.src(SOURCE.dir.dev.main + '*.css')
        .pipe(gulp.dest(SOURCE.dir.build.main));
});
gulp.task('build:main:others', function () {
    return gulp.src(SOURCE.dir.dev.main + '*.png')
        .pipe(gulp.dest(SOURCE.dir.build.main));
});
gulp.task('build:styles', function () {
    return gulp.src(SOURCE.dir.dev.styles.main + '*.css')
        .pipe(gulp.dest(SOURCE.dir.build.assets.styles.main));
});
gulp.task('build:styles:admin', function () {
    return gulp.src(SOURCE.dir.dev.styles.admin + '*.css')
        .pipe(gulp.dest(SOURCE.dir.build.assets.styles.admin));
});
gulp.task('build:styles:templates', function () {
    return gulp.src(SOURCE.dir.dev.styles.templates + '*.css')
        .pipe(gulp.dest(SOURCE.dir.build.assets.styles.templates));
});
gulp.task('build:styles:editor', function () {
    return gulp.src(SOURCE.dir.dev.styles.editor + '*.css')
        .pipe(gulp.dest(SOURCE.dir.build.assets.styles.editor));
});
gulp.task('build:scripts', function () {
    return gulp.src(SOURCE.dir.dev.scripts + '*.js')
        .pipe(gulp.dest(SOURCE.dir.build.assets.scripts));
});
gulp.task('build:scripts:libraries', function () {
    return gulp.src(SOURCE.dir.js.libraries + '*.js')
        .pipe(gulp.dest(SOURCE.dir.build.assets.scripts));
});
gulp.task('build:fonts', function () {
    return gulp.src(SOURCE.dir.dev.fonts + '*/*')
        .pipe(gulp.dest(SOURCE.dir.build.assets.fonts));
});
gulp.task('build:fonts:icon', function () {
    return gulp.src(SOURCE.dir.dev.iconfonts + '*/*')
        .pipe(gulp.dest(SOURCE.dir.build.assets.iconfonts));
});
gulp.task('build:images', function () {
    return gulp.src(SOURCE.dir.dev.images + '*/*')
        .pipe(gulp.dest(SOURCE.dir.build.assets.images));
});

gulp.task('build',
    gulp.series(
        gulp.parallel(
            'build:main',
            'build:main:styles',
            'build:main:others',
            'build:styles',
            'build:styles:admin',
            'build:styles:templates',
            'build:styles:editor',
            'build:scripts',
            'build:scripts:libraries',
            'build:fonts',
            'build:iconfonts',
            'build:images'
        )
    )
);
//  Default Task
gulp.task('default',
    gulp.series(
        gulp.parallel(
            'images',
        ),
        gulp.parallel(
            'styles:global',
            'styles:templates',
            'styles:admin',
            'styles:editor',
            'scripts:vendors'
        )
    )
);