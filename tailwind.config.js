const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '0.75': '3px',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            width: ['focus-within'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
