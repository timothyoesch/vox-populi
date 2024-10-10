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
                "foreground": "#ffffff",
                "background": "#CC00A3",
                "accent": "#00dafb"
            },
            "fontFamily": {
                "poppins": ["Poppins", "sans-serif"]
            }
        },
    },
    plugins: [],
}

