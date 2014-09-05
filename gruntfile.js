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
            'static/assets/styles/src'
          ]
        },
        files: {
          'static/assets/styles/app.css' : [
            'static/assets/styles/src/app.less'
          ]
        }
      },
      dev: {
        options: {
          yuicompress: false,
          relativeUrls: true,
          paths: [
            'static/assets/styles/src'
          ]
        },
        files: {
          'static/assets/styles/app.css' : [
            'static/assets/styles/src/app.less'
          ]
        }
      }
    },

    uglify: {
      dev: {
        options: {
          beautify: true,
          mangle: {
            except: ['jQuery' ]
          }
        },
        files: {
          'static/assets/scripts/app.js': ['static/assets/scripts/src/app.js']
        }
      },
      build: {
        options: {
          preserveComments: false,
          compress: {
            drop_console: true
          },
          beautify: false,
          mangle: {
            except: ['jQuery' ]
          }
        },
        files: {
          'static/assets/scripts/app.js': ['static/assets/scripts/src/app.js']
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
        files: [ 'gruntfile.js', 'static/assets/styles/src/*', 'static/assets/styles/src/colors/*' ],
        tasks: [ 'less' ]
      },
      scripts: {
        files: [
          'gruntfile.js',
          'composer.json',
          'static/assets/scripts/src/*.js'
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
          paths: './lib',
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
    'uglify',
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