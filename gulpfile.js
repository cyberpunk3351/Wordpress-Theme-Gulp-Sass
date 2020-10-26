let project_folder = "f:/OSPanel/OpenServer/domains/wordpress01/wp-content/themes/breakbeat03-gulp/";
let source_folder = "src";

let fs = require('fs');

let path = {
    build: {
        php: project_folder + "/",
        css: project_folder + "/assets/css",
        js: project_folder + "/assets/js",
        img: project_folder + "/assets/img",
        fonts: project_folder + "/assets/fonts",
    },
    src: {
        php: source_folder + "/php/**/*.php",
        css: source_folder + "/sass/style.sass",

        maincss: source_folder + "/css/style.css",
        mainimg: source_folder + "/img/screenshot.png",

        js: source_folder + "/js/script.js",
        img: [source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}", "!screenshot.png"],
        fonts: source_folder + "/fonts/*.{ttf,woff,woff2}",
    },
    watch: {
        php: source_folder + "/**/*.php",
        css: source_folder + "/sass/**/*.{sass,scss}",
        js: source_folder + "/js/**/*.js",
        img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}"
    },
}

let {src, dest} = require('gulp'),

    gulp = require('gulp'),
    browsersync = require("browser-sync").create(),
    fileinclude = require("gulp-file-include"),
    sass = require("gulp-sass"),
    autoprefixer = require("gulp-autoprefixer"),
    gcmq = require("gulp-group-css-media-queries"),
    clean_css = require("gulp-clean-css"),
    uglify = require("gulp-uglify-es").default,
    rename = require("gulp-rename"),
    imagemin = require('gulp-imagemin')

function browserSync(params) {
    browsersync.init(
        {
            proxy: "http://wordpress01/"
        })
}

function php() {
    return src(path.src.php)
        .pipe(dest(path.build.php))
        .pipe(browsersync.stream())
}


// Main Css
function maincss() {
    return src(path.src.maincss)
        .pipe(dest(path.build.php))
        .pipe(browsersync.stream())
}

// Main Screenshot
function mainimg() {
    return src(path.src.mainimg)
        .pipe(
            imagemin({
                progressive: true,
                svgoPlugins: [{ removeViewBox: false }],
                interlaced: true,
                optimizationLevel: 3
            })
        )
        .pipe(dest(path.build.php))
        .pipe(browsersync.stream())
}


function css(params) {
    return src(path.src.css)
        .pipe(
            sass({
                outputStyle: "expanded"
            })
        )
        .pipe(
            gcmq()
        )
        .pipe(autoprefixer(
            {
                overrideBrowserslist: ["last 5 versions"],
                cascade: true
            }
        ))
        .pipe(clean_css())
        .pipe(
            rename({
                extname: ".min.css"
            })
        )
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream())
}

function watchFiles(params) {
    gulp.watch([path.watch.php], php)
    gulp.watch([path.watch.css], css)
}
let build = gulp.series(gulp.parallel(maincss, css, php));
let maincsss = gulp.series(gulp.parallel(maincss, mainimg));
let watch = gulp.parallel(build, watchFiles, browserSync);

exports.css = css;
exports.maincss = maincsss;
exports.php = php;
exports.build = build;
exports.watch = watch;
exports.default = watch;
