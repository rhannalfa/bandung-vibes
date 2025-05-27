import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'brand-orange': '#f28c1d',
                'brand-orange-darker': '#d77a14',
                'brand-blue-dark': '#031a44',
                'brand-blue-dark-transparent': 'rgba(3, 26, 68, 0.85)',
                'brand-green-lime': '#A7C97A',
                'brand-green-lime-darker': '#8bb463',
                'brand-text-dark': '#1B2240',
                'brand-border-gray': '#9CA3AF',
                'brand-box-blue-bg': '#3674B5',
                'dest-title': '#0B1E44',
                'dest-button': '#E9A54B',
                'dest-button-hover': '#d4943f',
                'subtle-gray': '#f7fafc',
                'text-muted': '#6b7280',
            },
            fontFamily: {
                'sans': ['"Open Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                'open-sans-display': ['"Open Sans"', 'sans-serif'],
            },
            boxShadow: {
                'custom-light': '0 4px 12px rgba(0, 0, 0, 0.08)',
                'custom-medium': '0 8px 16px rgba(0, 0, 0, 0.1)',
                'custom-deep': '0 10px 25px rgba(0,0,0,0.1), 0 20px 40px rgba(0,0,0,0.05)',
            },
            transitionTimingFunction: {
                'custom-ease': 'cubic-bezier(0.25, 0.1, 0.25, 1)',
            },
        },
    },
    plugins: [],
};
