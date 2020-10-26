let project_folder = "f:/OSPanel/OpenServer/domains/wordpress01/wp-content/themes/breakbeat03-gulp/";
let source_folder = "src";

let fs = require('fs');

let path = {
    build: {
        php: project_folder + "/",
        css: project_folder + "/css",
        js: project_folder + "/js",
        img: project_folder + "/img",
    },
    src: {
        php: source_folder + "/php/**/*.php",
        css: source_folder + "/sass/style.sass",
        maincss: source_folder + "/css/style.css",
        js: source_folder + "/js/script.js",
        img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
    },
    watch: {
        php: source_folder + "/php/**/*.php",
        css: source_folder + "/sass/**/*.{sass,scss}",
        js: source_folder + "/js/**/*.js",
        img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}"
    },
}

let {src, dest} = require('gulp'),

    gulp = require('gulp'),
    browsersync = require("browser-sync").create(),
    fileinclude = require("gulp-file-include"),
    del = require("del"),
    sass = require("gulp-sass"),
    autoprefixer = require("gulp-autoprefixer"),
    gcmq = require("gulp-group-css-media-queries"),
    clean_css = require("gulp-clean-css"),
    uglify = require("gulp-uglify-es").default,
    rename = require("gulp-rename"),
    imagemin = require('gulp-imagemin'),

function browserSync(params) {
    browsersync.init(
        {
            server: {
                baseDir: "./" + project_folder + "/"
            },
            port:3000,
            notify: false
        })
}

function php() {
    return src(path.src.php)
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
        .pipe(dest(path.build.css))
        .pipe(clean_css())
        .pipe(
            rename({
                extname: ".min.css"
            })
        )
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream())
}

function maincss(params) {
    return src(path.src.maincss)
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream())
}

function js() {
    return src(path.src.js)
        .pipe(fileinclude())
        .pipe(dest(path.build.js))
        .pipe(
            uglify()
        )
        .pipe(
            rename({
                extname: ".min.js"
            })
        )
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream())
}

function clean(params) {
    return del(path.clean);
}

function images() {
    return src(path.src.img)
        .pipe(src(path.src.img))
        .pipe(
            imagemin({
                progressive: true,
                svgoPlugins: [{ removeViewBox: false }],
                interlaced: true,
                optimizationLevel: 3
            })
        )
        .pipe(dest(path.build.img))
        .pipe(browsersync.stream())
}

function watchFiles(params) {
    gulp.watch([path.watch.php], php)
    gulp.watch([path.watch.css], css)
    gulp.watch([path.watch.js], js)
    gulp.watch([path.watch.img], images)
}

let build = gulp.series(gulp.parallel(js, css, php, images), fontsStyle);
let watch = gulp.parallel(build, watchFiles, browserSync);
let maincss = gulp.series(maincss);

exports.images = images;
exports.js = js;
exports.css = css;
exports.css = maincss;
exports.php = php;
exports.build = build;
exports.watch = watch;
exports.default = watch;
exports.maincss = maincss;
