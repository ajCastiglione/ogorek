const gulp = require("gulp");
const plumber = require("gulp-plumber");
const sass = require("gulp-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const image = require("gulp-image");
const bs = require("browser-sync");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const webpack = require("webpack-stream");
const sourcemaps = require("gulp-sourcemaps");
const gulpif = require("gulp-if");

const env = process.env.NODE_ENV || "development";
const isDevelopment = env === "development";

const scss = ["library/scss/*/*.scss"];
const editorStyle = ["library/scss/editor-style.scss"];
const imgs = ["library/images/*"];
const js = "library/js/scripts.js";
const all = ["library/*.php", "*.php", "*/*.php", "library/js/*.js"];

// Compile and minify JS + babel
gulp.task("js", function () {
  return gulp
    .src(js)
    .pipe(
      webpack({
        mode: "production",
        output: {
          filename: "scripts.js",
        },
        module: {
          rules: [
            {
              test: /\.(js|jsx)$/,
              use: ["babel-loader"],
              exclude: /node_modules/,
            },
          ],
        },
      })
    )
    .pipe(gulpif(isDevelopment, sourcemaps.init()))
    .pipe(gulpif(!isDevelopment, uglify()))
    .pipe(rename({ extname: ".min.js" }))
    .pipe(gulpif(isDevelopment, sourcemaps.write(".")))
    .pipe(gulp.dest("./library/js/dist"));
});

//Compile scss
gulp.task("compile", () => {
  return gulp
    .src("./library/scss/*.scss")
    .pipe(plumber())
    .pipe(
      sass({
        outputStyle: "compressed",
      }).on("error", sass.logError)
    )
    .pipe(
      postcss([
        autoprefixer({
          browsers: ["last 2 versions"],
          cascade: false,
          grid: true,
        }),
      ])
    )
    .pipe(gulp.dest("./library/css"))
    .pipe(bs.stream());
});

gulp.task("compile-login", () => {
  return gulp
    .src("./library/scss/modules/login.scss")
    .pipe(plumber())
    .pipe(
      sass({
        outputStyle: "compressed",
      }).on("error", sass.logError)
    )
    .pipe(
      postcss([
        autoprefixer({
          browsers: ["last 2 versions"],
          cascade: false,
        }),
      ])
    )
    .pipe(gulp.dest("./library/css"));
});

gulp.task("compile-admin", () => {
  return gulp
    .src("./library/scss/editor-style.scss")
    .pipe(plumber())
    .pipe(
      sass({
        outputStyle: "compressed",
      }).on("error", sass.logError)
    )
    .pipe(
      postcss([
        autoprefixer({
          browsers: ["last 2 versions"],
          cascade: false,
        }),
      ])
    )
    .pipe(gulp.dest("./library/css"));
});

// Compress images and return them to folder
gulp.task("min-images", () => {
  gulp.src(imgs).pipe(image()).pipe(gulp.dest("./library/images"));
});

// Watch all files for compiling
gulp.task("init", () => {
  bs.init({
    proxy: "ogorek.test",
    injectChanges: true,
    files: all,
  });
  gulp.watch(scss, gulp.series("compile", "compile-login"));
  gulp.watch(js, gulp.series("js"));
  gulp.watch(editorStyle, gulp.series("compile-admin"));
});

// Start the process
gulp.task("default", gulp.series("init"));

// Build command
gulp.task("build", gulp.series("compile", "compile-login", "js"));
