var gulp           = require('gulp');
var elixir         = require('laravel-elixir');
var concat         = require('gulp-concat');
var uglify         = require('gulp-uglify');
var postcss        = require('gulp-postcss');
var autoprefixer   = require('autoprefixer');
var nano           = require('gulp-cssnano');
var comments       = require('postcss-discard-comments');

gulp.task('production', ['frontend-css', 'frontend-js']);

gulp.task('frontend-css', function () {
    return gulp.src([
        'public/assets/vendor/bootstrap/bootstrap.css',
        'public/assets/vendor/font-awesome/fa.css',
        'public/assets/css/frontend.css'
    ])
        .pipe(concat('f.css'))
        .pipe(postcss([
            comments({ removeAll: true }),
            autoprefixer({ browsers: ['last 4 versions'] })
        ]))
        .pipe(nano())
        .pipe(gulp.dest('public/assets/b/'));
});

gulp.task('frontend-js', function () {
    return gulp.src([
        'public/assets/vendor/bootstrap/bootsrap.js',
        'public/assets/vendor/lazysizes/lazysizes.js',
        'public/assets/js/frontend.js'
    ])
        .pipe(concat('f.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/b/'));
});

elixir(function(mix) {
    mix.version([
        'assets/b/f.js',
        'assets/b/f.css'
    ]);
});

gulp.task('lightbox-css', function () {
    return gulp.src([
        'public/assets/vendor/lightbox/themes/default/jquery.lightbox.css'
    ])
        .pipe(concat('jquery.lightbox.min.css'))
        .pipe(postcss([
            comments({ removeAll: true }),
            autoprefixer({ browsers: ['last 4 versions'] })
        ]))
        .pipe(nano())
        .pipe(gulp.dest('public/assets/vendor/lightbox/themes/default/'));
});