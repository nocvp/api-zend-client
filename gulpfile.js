// Load plugins
var argv = require('minimist')(process.argv.slice(2)),
    gulp = require('gulp'),
    runSequence = require('run-sequence'),
    conventionalChangelog = require('gulp-conventional-changelog'),
    bump = require('gulp-bump'),
    git = require('gulp-git'),
    fs = require('fs');

gulp.task('changelog', function() {
    return gulp.src('CHANGELOG.md', {
            buffer: false
        })
        .pipe(conventionalChangelog({
            preset: 'angular'
        }))
        .pipe(gulp.dest('./'));
});

gulp.task('bump-version', function() {
    var type;
    if (argv.major) {
        type = 'major';
    } else if (argv.minor) {
        type = 'minor';
    } else {
        type = 'patch';
    }

    return gulp.src(['./composer.json', './package.json'])
        .pipe(bump({ type: type }))
        .pipe(gulp.dest('./'));
});

gulp.task('commit-changes', function() {
    var version = JSON.parse(fs.readFileSync('./package.json', 'utf8')).version;
    return gulp.src('.')
        .pipe(git.add())
        .pipe(git.commit('chore(release): ' + version));
});

gulp.task('push-changes', function(cb) {
    git.push('origin', 'master', cb);
});

gulp.task('create-new-tag', function(cb) {
    var version = getPackageJsonVersion();
    git.tag(version, 'Create Tag for version: ' + version, function(error) {
        if (error) {
            return cb(error);
        }
        git.push('origin', 'master', { args: '--tags' }, cb);
    });

    function getPackageJsonVersion() {
        return JSON.parse(fs.readFileSync('./package.json', 'utf8')).version;
    };
});

gulp.task('release', function(callback) {
    runSequence(
        'bump-version',
        'changelog',
        'commit-changes',
        'push-changes',
        'create-new-tag',
        function(error) {
            if (error) {
                console.log(error.message);
            } else {
                console.log('RELEASE FINISHED SUCCESSFULLY');
            }
            callback(error);
        });
});

gulp.task('default', [])
