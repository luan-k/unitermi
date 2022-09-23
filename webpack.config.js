const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

let mode = "development";
/* let target = "web"; */
const plugins = [
  new CleanWebpackPlugin(),
  new MiniCssExtractPlugin(),
];

if (process.env.NODE_ENV === "production") {
  mode = "production";
  /*   target = "browserslist"; */
}

const config = {
  mode: mode,
  /* target: target, */

  entry: {
    main: "./scripts/index.js",
  },

  output: {
    path: path.resolve(__dirname, "dist"),
    assetModuleFilename: "images/[hash][ext][query]",
  },
  module: {
    rules: [
      {
        test: /\.(png|jpe?g|gif|svg)$/i,
        type: "asset",
      },
      {
        test: /\.(s[ac]|c)ss$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: { publicPath: "" },
          },

          "css-loader",
          "postcss-loader",
          "sass-loader",
        ],
      },
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
        },
      },
    ],
  },

  plugins: plugins,

  resolve: {
    extensions: [".js", ".jsx"],
  },

  devtool: "source-map",
};

// Fire up a local server if requested
if (process.env.SERVER) {
  config.plugins.push(
    new BrowserSyncPlugin({
      proxy: "uni-teste.local",
      files: ["**/*.php", "**/*.css", "**/*.scss"],
      notify: false,
    })
  );
}
module.exports = config;
