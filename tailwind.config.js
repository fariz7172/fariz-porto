import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    // Safelist colors used in admin panel
    safelist: [
        'bg-blue-500', 'bg-blue-600', 'hover:bg-blue-600',
        'bg-green-500', 'bg-green-600', 'hover:bg-green-600',
        'bg-purple-500', 'bg-purple-600', 'hover:bg-purple-600',
        'bg-red-500', 'bg-red-600', 'hover:bg-red-600',
        'bg-gray-100', 'bg-gray-200', 'hover:bg-gray-200',
        'text-green-700', 'text-red-600',
        'border-green-400', 'border-red-400',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // 60-30-10 Color Scheme
                primary: {
                    50: '#F8FAFC',
                    100: '#F1F5F9',
                    200: '#E2E8F0',
                },
                secondary: {
                    700: '#334155',
                    800: '#1E293B',
                    900: '#0F172A',
                },
                accent: {
                    400: '#818CF8',
                    500: '#6366F1',
                    600: '#4F46E5',
                },
            },
        },
    },

    plugins: [forms],
};
