const path = require('path');
const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const LoaderTransform = require('./build/component-loader-transformer');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const config = require('./config/config');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

function issuer(m) {
	return (m.issuer ? issuer(m.issuer) : (m.name ? m.name : false));
}

function configSassVariables() {
	let sass = config.styles.sass;

	if (!(typeof sass === 'object' && sass !== null)) return '';

	return Object.keys(sass).reduce((variables, variable) => {
		if (typeof sass[variable] === 'string') {
			variables += `$${variable}:${sass[variable]};`;
		} else if (typeof sass === 'object' && sass !== null) {
			variables += `$${variable}:(${Object.keys(sass[variable]).reduce((_val, _var) => _val += `${_var}:${sass[variable][_var]},`, '')});`
		}
		return variables;
	}, '');
}

let scssLoaders = [
	'vue-style-loader', 'css-loader',
	{
		loader: 'sass-loader',
		options: {
			data: `@import "./app/src/styles/settings.scss";`
		}
	}
];
let pluginList = [
	new VueLoaderPlugin(),
	new BrowserSyncPlugin({
		host: 'cheaphurricaneinsurance.local',
		port: 8080,
		proxy: 'cheaphurricaneinsurance.local'
	})
];
let entryFile = './app/src/main.js';
let optimization = {};

module.exports = (env, argv) => {
	if (env && env.admin) {
		scssLoaders = [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'];
		pluginList = [
			new MiniCssExtractPlugin({
				filename: '[name].css'
			})
		];
		entryFile = {
			admin: [
				'./_src/scripts/admin.js',
				'./_src/styles/admin.scss'
			]
		};
		optimization = {
			splitChunks: {
				cacheGroups: {
					adminCss: {
						name: 'admin',
						test: (m, c, entry = 'admin') => m.constructor.name === 'CssModule' && issuer(m) === entry,
						chunks: 'all',
						enforce: true,
					}
				}
			}
		}
	} else if (env && env.theme) {
		scssLoaders = [MiniCssExtractPlugin.loader, 'css-loader',
			{
				loader: 'sass-loader',
				options: {
					sourceMap: true,
					data: configSassVariables()
				}
			}
		];
		pluginList = [
			new MiniCssExtractPlugin({
				filename: '[name].css'
			}),
			new CopyWebpackPlugin([
				{
					from: './build/component-loader.js', to: '../../_src/scripts/frontend/', transform(content) {
						return LoaderTransform(content)
					}
				}
			]),
		];
		entryFile = {
			theme: [
				'@babel/polyfill',
				'./_src/scripts/theme.js',
				'./_src/styles/theme.scss'
			]
		};
		optimization = {
			splitChunks: {
				cacheGroups: {
					themeCss: {
						name: 'theme',
						test: (m, c, entry = 'theme') => m.constructor.name === 'CssModule' && issuer(m) === entry,
						chunks: 'all',
						enforce: true,
					}
				}
			}
		}
	}

	return {
		entry: entryFile,
		externals: {jquery: 'jQuery'},
		output: {
			path: path.resolve(__dirname, './app/dist'),
			publicPath: '/app/dist/'
		},
		module: {
			rules: [
				{
					test: /\.vue$/,
					use: {
						loader: 'vue-loader'
					}
				},
				{
					test: /\.css$/,
					use: [
						'vue-style-loader',
						'css-loader'
					]
				},
				{
					test: /\.scss$/,
					use: scssLoaders
				},
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: {
						loader: 'babel-loader'
					}
				}
			]
		},
		resolve: {
			alias: {
				'vue$': 'vue/dist/vue.esm.js'
			},
			extensions: ['.vue', '.js', '.json']
		},
		optimization: optimization,
		plugins: pluginList,
		devServer: {
			historyApiFallback: true,
			noInfo: true
		},
		devtool: '#eval-source-map'
	};
};
