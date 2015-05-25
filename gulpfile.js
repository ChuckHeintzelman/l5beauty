var elixir = require('laravel-elixir');

elixir(function(mix) {
    var dtPluginsDir = 'vendor/bower_components/datatables-plugins/';

    // Copy jquery, bootstrap, and font awesome
    mix.copy(
        'vendor/bower_components/jquery/dist/jquery.js',
        'resources/assets/js/jquery.js'
    ).copy(
        'vendor/bower_components/bootstrap/less',
        'resources/assets/less/bootstrap'
    ).copy(
        'vendor/bower_components/bootstrap/dist/js/bootstrap.js',
        'resources/assets/js/bootstrap.js'
    ).copy(
        'vendor/bower_components/bootstrap/dist/fonts',
        'public/assets/fonts'
    ).copy(
        'vendor/bower_components/fontawesome/less',
        'resources/assets/less/fontawesome'
    ).copy(
        'vendor/bower_components/fontawesome/fonts',
        'public/assets/fonts'
    );

    // Copy datatables
    mix.copy(
        'vendor/bower_components/datatables/media/js/jquery.dataTables.js',
        'resources/assets/js/dataTables.js'
    ).copy(
        dtPluginsDir + 'integration/bootstrap/3/dataTables.bootstrap.css',
        'resources/assets/less/dataTables.less'
    ).copy(
        dtPluginsDir + 'integration/bootstrap/3/dataTables.bootstrap.js',
        'resources/assets/js/dataTables.bootstrap.js'
    );

    // Copy selectize and pickadate
    mix.copy(
        'vendor/bower_components/selectize/dist/css',
        'public/assets/selectize/css'
    ).copy(
        'vendor/bower_components/selectize/dist/js/standalone/selectize.min.js',
        'public/assets/selectize/selectize.min.js'
    ).copy(
        'vendor/bower_components/pickadate/lib/compressed/themes',
        'public/assets/pickadate/themes'
    ).copy(
        'vendor/bower_components/pickadate/lib/compressed/picker.js',
        'public/assets/pickadate/picker.js'
    ).copy(
        'vendor/bower_components/pickadate/lib/compressed/picker.date.js',
        'public/assets/pickadate/picker.date.js'
    ).copy(
        'vendor/bower_components/pickadate/lib/compressed/picker.time.js',
        'public/assets/pickadate/picker.time.js'
    );

    // Copy the Clean Blog Less files
    mix.copy(
        'vendor/bower_components/clean-blog/less',
        'resources/assets/less/clean-blog'
    );

    // Combine admin scripts
    mix.scripts([
        'js/jquery.js',
        'js/bootstrap.js',
        'js/dataTables.js',
        'js/dataTables.bootstrap.js'
    ], 'public/assets/js/admin.js', 'resources/assets');

    // Combine blog scripts
    mix.scripts([
        'js/jquery.js',
        'js/bootstrap.js',
        'js/blog.js'
    ], 'public/assets/js/blog.js', 'resources/assets');

    // Compile Less
    mix.less('admin.less', 'public/assets/css');
    mix.less('blog.less', 'public/assets/css');
});