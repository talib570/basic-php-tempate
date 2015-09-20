'use strict';

module.exports = function(grunt) {

    var activeProjectFiles = [
                                '**',
                                '.htaccess',
                                '!**/node_modules/**',
                                '!**/docs/**',
                                '!**/Build/**',
                                '!**/screenshots/**',
                                '!**/test/**',
                                '!**/package.json',
                                '!**/config.json',
                                '!**/GruntFile.js',
                                '!**/*.ftppass',
                                '!**/app.js',
                                '!**/build.js',
                                '!**/*.gitignore',
                                '!**/README.md',
                                '!**/npm-debug.log',
                            ];

    var   testing_database = 'basic_php_testing',
            mysql_user = 'root', // root user must not be 
                                           // used on production
            mysql_password = '';

    //Project Configuration
    grunt.initConfig({
            //Metadata
            pkg : grunt.file.readJSON('package.json'),
            conf: grunt.file.readJSON('config.json'),

            //Sets as banner on minified JS file
            banner: '/*! <%= conf.title || conf.name %> - v<%= conf.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
                '<%= conf.homepage ? "* " + conf.homepage + "\\n" : "" %>' +
                '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= conf.author.name %>;' +
                'Licensed <%= _.pluck(conf.licenses, "type").join(", ") %> */\n',
    });

};