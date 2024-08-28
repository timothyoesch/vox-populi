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
                "foreground": "#1A2471",
                "background": "#FFD647"
            },
            "fontFamily": {
                "poppins": ["Poppins", "sans-serif"]
            }
        },
    },
    plugins: [],
}

