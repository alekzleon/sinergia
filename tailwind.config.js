import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                // Paleta basada en el logo
                primary: {
                    50:  '#EBF3FB',
                    100: '#C8DCF3',
                    200: '#9DC0E8',
                    300: '#71A3DC',
                    400: '#5B90CF',
                    500: '#4A7DB5', // Azul institucional principal
                    600: '#3D6A9A',
                    700: '#30567E',
                    800: '#234162',
                    900: '#162D46',
                },
                secondary: {
                    50:  '#F1F8E9',
                    100: '#DCEDC8',
                    200: '#C5E1A5',
                    300: '#AED581',
                    400: '#9CCC65',
                    500: '#7CB342', // Verde esperanza principal
                    600: '#6EA039',
                    700: '#558B2F',
                    800: '#3D7A26',
                    900: '#26691C',
                },
                accent: {
                    50:  '#FFF3E0',
                    100: '#FFE0B2',
                    200: '#FFCC80',
                    300: '#FFB74D',
                    400: '#FFA726',
                    500: '#FF8C00', // Naranja humano principal
                    600: '#F57C00',
                    700: '#E65100',
                    800: '#BF360C',
                    900: '#8D1C0A',
                },
                lilac: {
                    50:  '#F3E5F5',
                    100: '#E1BEE7',
                    200: '#CE93D8',
                    300: '#BA68C8',
                    400: '#AB47BC',
                    500: '#9575CD', // Lila inclusión principal
                    600: '#7E57C2',
                    700: '#673AB7',
                    800: '#512DA8',
                    900: '#311B92',
                },
                warm: {
                    50:  '#FAFAF8',
                    100: '#F5F4F0',
                    200: '#ECEAE3',
                    300: '#E0DDD4',
                },
            },
            fontFamily: {
                sans: ['Inter', 'Nunito', ...defaultTheme.fontFamily.sans],
                heading: ['Nunito', 'Inter', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'gradient-warm': 'linear-gradient(135deg, #4A7DB5 0%, #9575CD 100%)',
                'gradient-hope': 'linear-gradient(135deg, #7CB342 0%, #4A7DB5 100%)',
                'gradient-hero': 'linear-gradient(to bottom right, rgba(74,125,181,0.85), rgba(149,117,205,0.75))',
            },
        },
    },
    plugins: [forms, typography],
};
