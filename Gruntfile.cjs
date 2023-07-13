module.exports = function(grunt) {

    grunt.initConfig({
        'dart-sass': {
            plantilla: {
                options: {
                    outputStyle: 'compressed'
                },
                files: {
                    'public/plantilla/css/plantilla.min.css': 'resources/adminlte-3/scss/adminlte.scss'
                }
            },
        },
        terser: {
            plantilla: {
                files: {
                    'public/plantilla/js/plantilla.min.js': [
                        'node_modules/jquery/dist/jquery.min.js',
                        'node_modules/bootstrap/dist/js/bootstrap.min.js',
                        'resources/adminlte-3/js/adminlte.min.js'
                    ]
                }
            }
        },
    });

    grunt.loadNpmTasks('grunt-dart-sass');
    grunt.loadNpmTasks('grunt-terser');

    grunt.registerTask('css-plantilla', ['dart-sass:plantilla']);
    grunt.registerTask('js-plantilla', ['terser:plantilla']);
};