const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
  entry: [
    './assets/main.sass',
    './assets/index.js',
  ],
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    })
  ],
  output: {
    path: path.resolve(__dirname, 'public/assets'),
    filename: 'index.js'
  },
  module: {
    rules: [
      {
        test: /\.(scss|sass)$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          {
            loader: 'css-loader',// translates CSS into CommonJS modules
          },
          {
            loader: 'sass-loader' // compiles Sass to CSS
          },
        ]
      },
    ]
  }
}
