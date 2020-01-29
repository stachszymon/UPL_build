const { src, dest, parallel, watch } = require('gulp');
const sass = require('gulp-sass');
const csso = require('gulp-csso');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const headerComment = require('gulp-header-comment');

const destPath = './../umowypodlupa/';

function styles() {
	return src('styles/main.scss')
		.pipe(sass())
		.pipe(csso())
		.pipe(concat('style.css'))
		.pipe(autoprefixer())
		.pipe(
			headerComment(`
            Theme Name: Umowy Pod Lupa
            Theme URI: https://owlit.dev/
            Author: owlit.dev
            Author URI: https://owlit.dev/
            Description: Theme rebuilded based on old website.
            Version: 1.0
            License: UNLICENCED
            License URI: 
            Text Domain: umowypodlupa
            Tags: one-column, two-columns, right-sidebar, flexible-header, accessibility-ready, custom-colors, custom-header, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, post-formats, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready
        `),
		)
		.pipe(dest(destPath, { sourcemaps: true }));
}

function php() {
	return src('php/**/*.php')
		.pipe(dest(destPath));
}

function scripts() {
	return src('scripts/**/*.php')
		.pipe(dest(destPath));
}

function extra() {
	return src('extra/**/*')
		.pipe(dest(destPath));
}

exports.styles = styles;
exports.php = php;
exports.scripts = scripts;
exports.extra = extra;
exports.watch = () => watch(['styles/**/*', 'php/**/*', 'scripts/**/*', 'extra/**/*'], parallel(styles, php, scripts, extra));