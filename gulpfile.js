var gulp           = require('gulp');
var elixir         = require('laravel-elixir');
var concat         = require('gulp-concat');
var uglify         = require('gulp-uglify');
var postcss        = require('gulp-postcss');
var autoprefixer   = require('autoprefixer-core');
var nano           = require('gulp-cssnano');
var comments       = require('postcss-discard-comments');
var sorting        = require('postcss-sorting');
var mqpacker       = require('css-mqpacker');

gulp.task('production', ['frontend-css', 'frontend-js']);

gulp.task('frontend-css', function () {
    return gulp.src([
        'public/assets/css/source/bootsrap.css',
        'public/assets/css/source/font-awesome.css',
        'public/assets/css/source/frontend.css'
    ])
        .pipe(concat('f.css'))
        .pipe(postcss([
            comments({ removeAll: true }),
            autoprefixer({ browsers: ['last 4 versions'] }),
            mqpacker({ sort: true }),
            sorting()
        ]))
        .pipe(nano())
        .pipe(gulp.dest('public/assets/css/build/'));
});

gulp.task('frontend-js', function () {
    return gulp.src([
        'public/assets/js/source/bootsrap.js',
        'public/assets/plugins/lazysizes/lazysizes.js',
        'public/assets/js/source/frontend.js'
    ])
        .pipe(concat('f.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js/build/'));
});

elixir(function(mix) {
    mix.version([
        'assets/js/build/f.js',
        'assets/css/build/f.css'
    ]);
});