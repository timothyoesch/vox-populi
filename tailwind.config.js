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
                "background": "#000000",
                "foreground": "#FFED00",
            },
        },
    },
    plugins: [],
}

