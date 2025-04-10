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
            colors: {
                vino: '#9F2241',
                verde: '#235B4E',
                beige: '#DDC9A3',
                gris: '#98989A',
                vinoOscuro: '#691C32',
                bosque: '#10312B',
                blanco: '#FFFFFF',
                dorado: '#BC955C',
                grisMedio: '#6F7271',
                gris2: '#ECEFF1',
                blue: '#3B82F6',
                azulOscuro: '#1E3A8A',
                azulClaro: '#93C5FD',
                bluegpt: '#2E3B3E',
                verdegpt: '#3F5741',
                cafegpt: '#512B2B',
            }
        },
        
    },

    plugins: [forms],
};
