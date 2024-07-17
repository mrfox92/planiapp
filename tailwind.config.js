import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'xs': '0px',  // Bootstrap no tiene 'xs' por defecto, pero Tailwind CSS sí
                'sm': '576px', // Small devices (landscape phones, 576px and up)
                'md': '768px', // Medium devices (tablets, 768px and up)
                'lg': '992px', // Large devices (desktops, 992px and up)
                'xl': '1200px', // Extra large devices (large desktops, 1200px and up)
                '2xl': '1400px', // Bootstrap no tiene '2xl', pero Tailwind CSS sí
              }
        },
    },

    plugins: [forms],
};
