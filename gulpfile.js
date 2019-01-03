const gulp = require("gulp");
const imagemin = require("gulp-imagemin");

gulp.task("default", () =>
  gulp
    .src("src/**/**/*.*")
    .pipe(
      imagemin([
        imagemin.gifsicle({
          interlaced: true
        }),
        imagemin.jpegtran({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 6
        }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: true
            },
            {
              cleanupIDs: false
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest("dist/"))
);
