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
                sans: ['Inter', 'Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                'qoin': '32px',
                'qoin-sm': '24px',
            },
            colors: {
                qoin: {
                    light: '#FF944B',
                    DEFAULT: '#FD6700',
                    dark: '#D95800',
                },
                brand: {
                    50: '#fff7ed',
                    100: '#ffedd5',
                    200: '#fed7aa',
                    300: '#fdba74',
                    400: '#FF944B',
                    500: '#FD6700', // Qoin Orange
                    600: '#ea580c',
                    700: '#c2410c',
                    800: '#9a3412',
                    900: '#7c2d12',
                    950: '#431407',
                },
                accent: {
                    50: '#f0fdf4',
                    100: '#dcfce7',
                    200: '#bbf7d0',
                    300: '#86efac',
                    400: '#4ade80',
                    500: '#22c55e', // Green buttons
                    600: '#16a34a',
                    700: '#15803d',
                },
                cream: {
                    50: '#FFFDF9',
                    100: '#FAF5EE', // warm cream / soft beige
                    200: '#F5EBDD',
                    300: '#EBD8C3',
                    DEFAULT: '#FAF5EE',
                },
                'red-orange': {
                    50: '#FFF1ED',
                    100: '#FFE0D5',
                    200: '#FFC2B0',
                    300: '#FF977A',
                    400: '#FF6842',
                    500: '#FF4500', // bold red-orange
                    600: '#E63900',
                    700: '#BF2B00',
                    DEFAULT: '#FF4500',
                },
                warm: {
                    50: '#fdfdfd',
                    100: '#FAF5EE',
                    200: '#F5EBDD',
                },
            },
        },
    },

    plugins: [forms],
};