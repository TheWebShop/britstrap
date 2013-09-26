/*global module:false,require:false*/

var gm = require('gm');

module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      public: {
        src: ['js/vendor/*.js', 'js/public/*.js'],
        dest: 'js/dist/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      public: {
        src: '<%= concat.public.dest %>',
        dest: 'js/dist/<%= pkg.name %>.js'
      }
    },
    jshint: {
      options: {
        curly: false,
        eqeqeq: true,
        es3: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {}
      },
      gruntfile: {
        options: {
          es3: false
        },
        src: 'Gruntfile.js'
      },
      js: {
        src: 'js/public/*.js'
      }
    },
    watch: {
      gruntfile: {
        files: 'Gruntfile.js',
        tasks: ['jshint:gruntfile']
      },
      js: {
        files: 'js/public/*.js',
        tasks: ['jshint:js', 'concat']
      },
      php: {
        files: [
        '*.php',
        'inc/*.php'
        ]
      },
      stylesheets: {
        files: 'stylesheets/**/*.less',
        tasks: ['less:development']
      },
      options: {
        livereload: 35739
      },
    },
    less: {
      development: {
        files: {
          "style.css": [
            "stylesheets/banner.less",
            "stylesheets/bootstrap.less",
            "stylesheets/bootstrap-theme.less",
            "stylesheets/ui/*.less"
          ]
        }
      },
      production: {
        options: {
          yuicompress: true,
          report: 'gzip'
        },
        files: {
          "style.css": [
            "stylesheets/banner.less",
            "stylesheets/bootstrap.less",
            "stylesheets/bootstrap-theme.less",
            "stylesheets/ui/*.less"
          ]
        }
      }
    },
    autoshot: {
      default_options: {
        options: {
          path: 'screenshots',
          filename: 'screenshot',
          type: 'png',
          remote: 'http://localhost/britstrap/?page_id=26',
          viewport: ['480x320', '1024x768', '1920x1080']
        },
      },
    },
    rename: {
      main: {
        files: [
          {src: ['screenshots/remote-screenshot-480x320.png'], dest: 'screenshots/mobile-480x320.png'},
          {src: ['screenshots/remote-screenshot-1024x768.png'], dest: 'screenshots/tablet-1024x768.png'},
          {src: ['screenshots/remote-screenshot-1920x1080.png'], dest: 'screenshots/desktop-1920x1080.png'}
        ]
      }
    },
    // generates a WP theme thumbnail from screenshot
    resize : {
      options: {
        width: 600,
        height: 450,
        to: 'screenshot.png'
      },
      mobile: {
        options: {
          from: 'screenshots/mobile-480x320.png'
        }
      },
      tablet: {
        options: {
          from: 'screenshots/tablet-1024x768.png'
        }
      },
      desktop: {
        options: {
          from: 'screenshots/desktop-1920x1080.png'
        }
      }
    }
  });

  grunt.registerMultiTask('resize', 'Resizes images to limiting dimension then crops.', function() {
    var done = this.async();
    var options = this.options();

    gm.prototype.fitHorizontal = function(start, end) {
      grunt.log.writeln('Resizing to fit horizontally, then cropping top.');

      return this.resize(end.width)
        .crop(end.width, end.height, 0, 0);
    };
    gm.prototype.fitVertical = function(start, end) {
      var width = start.width * (end.height/start.height);
      var offsetLeft = (width - end.width)/2;

      grunt.log.writeln('Resizing to fit vertically, then cropping centered.');

      return this.resize(null, end.height)
        .crop(end.width, end.height, offsetLeft, 0);
    };

    grunt.file.delete(options.to);
    var image = gm(options.from)
      .size(function (err, size) {

        if(size.width/size.height > options.width/options.height) {
          image.fitVertical(size, options);
        }else {
          image.fitHorizontal(size, options);
        }
        image.write(options.to, done);
      });
  });

  grunt.registerTask('build', ['jshint', 'concat', 'uglify', 'less:production']);
  grunt.registerTask('ss', ['autoshot', 'rename', 'resize:desktop']);
  grunt.registerTask('default', ['watch']);
};
