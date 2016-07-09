var elixir = require('laravel-elixir');

elixir.config.assetsPath = 'public/themes/default/assets';
elixir.config.publicPath = elixir.config.assetsPath;

elixir.config.css.sass.pluginOptions.includePaths = [
  'node-modules/font-awesome/scss'
];

elixir(function (mix) {
  mix.copy('node-modules/font-awesome/assets/fonts/**', elixir.config.publicPath + '/fonts');
  mix.copy('node-modules/font-awesome/css/**', 'public/themes/default/assets/css');
  mix.copy('node_modules/bootstrap/dist/css/**', elixir.config.publicPath + '/css');
  mix.copy('node_modules/bootstrap/fonts/**', elixir.config.publicPath + '/fonts');
  mix.copy('node_modules/bootstrap/fonts/**', elixir.config.publicPath + '/fonts');
  mix.copy('node_modules/moment/min/moment.min.js', elixir.config.publicPath + '/js/moment.js');
  //mix.sass('backend.scss');
});
