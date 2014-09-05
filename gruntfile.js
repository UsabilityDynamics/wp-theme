/**
 * Build Theme
 *
 * @author Usability Dynamics
 * @version 1.0.0
 * @param grunt
 */
module.exports = function( grunt ) {

  var _directories = {};

  // Automatically Load Tasks
  require( 'load-grunt-tasks' )( grunt, {
    pattern: 'grunt-*',
    config: './package.json',
    scope: 'devDependencies'
  });

  // Show elapsed time
  require( 'time-grunt' )(grunt);

  // Build Configuration.
  grunt.initConfig({

    // Get Project Package.
    composer: grunt.file.readJSON( 'composer.json' ),

    // LESS Compilation.
    less: {
      build: {
        options: {
          yuicompress: true,
          relativeUrls: true,
          paths: [
            'static/styles/src'
          ]
        },
        files: {
          'static/styles/app.css' : [
            'static/styles/src/app.less'
          ]
        }
      },
      dev: {
        options: {
          yuicompress: false,
          relativeUrls: true,
          paths: [
            'static/styles/src'
          ]
        },
        files: {
          'static/styles/app.css' : [
            'static/styles/src/app.less'
          ]
        }
      }
    },

    // Require JS Tasks.
    requirejs: {
      production: {
        options: require( './composer' ).config.component
      },
      development: {
        options: require( './composer' ).config.component
      }
    },

    // Monitor.
    watch: {
      options: {
        interval: 1000,
        debounceDelay: 500
      },
      styles: {
        files: [ 'gruntfile.js', 'static/styles/src/*', 'static/styles/src/colors/*' ],
        tasks: [ 'less' ]
      },
      scripts: {
        files: [
          'gruntfile.js',
          'composer.json',
          'static/scripts/src/*.js',
          'static/scripts/src/lib/*.js',
          'static/scripts/src/components/*.js'
        ],
        tasks: [ 'requirejs' ]
      },
      docs: {
        files: [ 'styles/app.*.css', 'composer.json', 'readme.md' ],
        tasks: [ 'markdown' ]
      },
      livereload: {
        options: {
          livereload: false
        },
        files: [
          'assets/assets/**.css',
          'static/assets/**.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },

    // Documentation
    yuidoc: {
      compile: {
        name: '<%= composer.name %>',
        description: '<%= composer.description %>',
        version: '<%= composer.version %>',
        url: '<%= composer.author.url %>',
        logo: 'http://media.usabilitydynamics.com/logo.png',
        options: {
          paths: './',
          outdir: 'static/codex'
        }
      }
    }

  });

  // Register tasks
  grunt.registerTask('default', [
    'dev'
  ]);

  grunt.registerTask('dev', [
    'yuidoc'
  ]);

  grunt.registerTask('install', [
  ]);

  grunt.registerTask('build', [
    'jshint',
    'less:build',
    'uglify',
    'modernizr',
    'version'
  ]);

};