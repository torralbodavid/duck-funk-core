const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {},
    purge: {
        content: [
            './src/app/**/*.php',
            './src/resources/**/*.html',
            './src/resources/**/*.js',
            './src/resources/**/*.jsx',
            './src/resources/**/*.ts',
            './src/resources/**/*.tsx',
            './src/resources/**/*.php',
            './src/resources/**/*.vue',
            './src/resources/**/*.twig',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/ui'),
    ],
};
