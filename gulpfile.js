// Gulp
const {src, dest, watch, parallel} = require("gulp");
const plumber = require("gulp-plumber");
const sourcemaps = require("gulp-sourcemaps");
// Sass
const sass = require("gulp-sass")(require("sass"));
// CSS
const cssnano = require("cssnano");
const autoprefixer = require("autoprefixer");
const postcss = require("gulp-postcss");
// JS
const js = require("gulp-terser-js");
// Imágenes
const cache = require("gulp-cache");
const imagemin = require("gulp-imagemin");
const webp = require("gulp-webp");
const avif = require("gulp-avif");

/* Tasks */
function compile_sass(done) {
    src("src/scss/**/*.scss")
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write("."))
        .pipe(dest("build/css"));
    done();
}
function optimize_js(done) {
    src("src/js/**/*.js")
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(js())
        .pipe(sourcemaps.write("."))
        .pipe(dest("build/js"));
    done();
}
function watch_files(done) {
    watch("src/scss/**/*.scss", compile_sass);
    watch("src/js/**/*.js", optimize_js);
    done();
}
function optimize_imagenes(done) {
    const parameters = {optimizationLevel: 3};
    src("src/img/**/*.{png,jpg}")
        .pipe(cache(imagemin(parameters)))
        .pipe(dest("build/img"));
    done();
}
function to_webp(done) {
    const parameters = {quality: 50};
    src("src/img/**/*.{png,jpg}")
        .pipe(webp(parameters))
        .pipe(dest("build/img"));
    done();
}
function to_avif(done) {
    const parameters = {quality: 50};
    src("src/img/**/*.{png,jpg}")
        .pipe(avif(parameters))
        .pipe(dest("build/img"));
    done();
}
function mover_svg() {
    return src("src/img/**/*.svg")
        .pipe(dest("build/img"));
}

exports.imagenes_ = parallel(optimize_imagenes, to_webp, to_avif, mover_svg);
exports.look_ = parallel(compile_sass, optimize_js, watch_files);