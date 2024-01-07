const gulp = require("gulp");
const concat = require("gulp-concat");
const terser = require("gulp-terser");
const sass = require("gulp-sass")(require("sass"));
const sourcemaps = require("gulp-sourcemaps");
const { src, series, parallel, dest, watch } = require("gulp");

const adminJsPath = "admin/editable-js/*.js";
const adminCssPath = "admin/editable-css/*.css";
const publicJsPath = "public/editable-js/*.js";
const publicCssPath = "public/editable-css/*.css";


function adminJsTask() {
	return src(adminJsPath)
		.pipe(sourcemaps.init())
		.pipe(concat("contact-widget-op-admin.js"))
		.pipe(terser())
		.pipe(sourcemaps.write("."))
		.pipe(dest("admin/js/"));
}

function adminCssTask() {
	return src(adminCssPath)
		.pipe(concat("contact-widget-op-admin.css"))
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(dest("admin/css/"));
}

function publicJsTask() {
	return src(publicJsPath)
		.pipe(sourcemaps.init())
		.pipe(concat("contact-widget-op-public.js"))
		.pipe(terser())
		.pipe(sourcemaps.write("."))
		.pipe(dest("public/js/"));
}

function publicCssTask() {
	return src(publicCssPath)
		.pipe(concat("contact-widget-op-public.css"))
		.pipe(sass({ outputStyle: "compressed" }))
		.pipe(dest("public/css/"));
}

function watchTask() {
	watch(
		[adminJsPath, adminCssPath, publicJsPath, publicCssPath],
		{ interval: 1000 },
		parallel(adminCssTask, adminJsTask, publicJsTask, publicCssTask)
	);
}

exports.adminJsTask = adminJsTask;
exports.adminCssTask = adminCssTask;
exports.publicJsTask = publicJsTask;
exports.publicCssTask = publicCssTask;
exports.default = series(parallel(adminCssTask, adminJsTask, publicJsTask, publicCssTask), watchTask);
