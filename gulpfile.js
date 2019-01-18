var gulp = require('gulp');

var concat = require('gulp-concat');
var minifycss = require('gulp-clean-css');
var rename = require('gulp-rename');
const uglify = require('gulp-terser');
var removeFiles = require('gulp-remove-files');

var date  = new Date(),
    timestamp = date.getTime();

gulp.task('timestamp', function() {
    require('fs').writeFileSync('resources/assets/timestamp.txt', timestamp);
});

gulp.task('deleteTableFiles', function() {
    gulp.src(['public/js/*-scripts.min.js', 'public/css/*-styles.min.css'])
        .pipe(removeFiles());
});
    
gulp.task('styles', function(){

    return gulp.src([
        'resources/assets/Select2/*.css',
        'resources/assets/css/*.css',
        'resources/assets/DataTables/*.min.css',
        'resources/assets/Daterangepicker/*.css',
        'resources/assets/DataTables/Select-1.2.6/css/*.min.css',
    ])
    .pipe(concat(timestamp+'-styles.min.css'))
    .pipe(minifycss()).on('error', function(e){
        console.log(e);
    })
    .pipe(gulp.dest('public/css'));
});

gulp.task('scripts', function() {
    return gulp.src([
        'resources/assets/js/jquery-3.3.1.min.js',
        'resources/assets/ChartJS/Chart.min.js',
        'resources/assets/Select2/select2.full.min.js',
        'resources/assets/Select2/pt-BR.js',
        'resources/assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
        'resources/assets/DataTables/DataTables-1.10.18/js/*.min.js',
        'resources/assets/DataTables/pdfmake-0.1.36/vfs_fonts.js',
        'resources/assets/DataTables/pdfmake-0.1.36/*.min.js',
        'resources/assets/Daterangepicker/moment.min.js',
        'resources/assets/Daterangepicker/daterangepicker.js',
        'resources/assets/js/tables/*.js',
        'resources/assets/js/selects.js',
        'resources/assets/js/customFieldValue.js',
        'resources/assets/js/modal.js',
        'resources/assets/**/*.min.js',
        'resources/assets/js/dashboards/adminDashboard.js',
    ])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('public/js'))
    .pipe(rename(timestamp+'-scripts.min.js'))
    .pipe(uglify()).on('error', function(e){
        console.log(e);
    })
    .pipe(gulp.dest('public/js'));
});

gulp.task('default', ['build']);
gulp.task('build', ['deleteTableFiles', 'scripts', 'styles', 'timestamp']);
gulp.task('watch',['build'], function(){
    gulp.watch('resources/assets/**/*.css', ['build']);
    gulp.watch('resources/assets/**/*.js', ['build']);
});