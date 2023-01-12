const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {

            },
            colors: {
                'primary': '#59FF74',
                'secondary': '#FFB74D',
                'danger': '#FF5252',
                'dark': '#212121',
                'light': '#F5F5F5',
                'white': '#FFFFFF',
                'black': '#000000',
                'gray': '#9E9E9E',
                'gray-light': '#E0E0E0',
                'gray-dark': '#616161',
                'good':'#7c1fec',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
