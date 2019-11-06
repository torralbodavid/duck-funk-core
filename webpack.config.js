var webpack = require('webpack');

module.exports = {
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [
                    'css-loader',
                    {
                        loader: 'css-url-loader',
                        options: {
                            from: '../images/',
                            to: '/dir/assets/'
                        }
                    }
                ],
            },
        ],
    },
}
