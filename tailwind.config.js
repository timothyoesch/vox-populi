/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './lang/*.json',
    ],
    theme: {
        extend: {
            "colors": {
                "background": "#280050",
                "foreground": "#FFE53E",
            },
            "fontFamily": {
                "inter": ["Inter", "sans-serif"],
                "garamond": ["EB Garamond", "serif"],
            }
        },
    },
    plugins: [],
}

