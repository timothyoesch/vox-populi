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
                "background": "#fff",
                "foreground": "#000",
                "accent": "#248BCC",
                "secondary": "#88FF00",
            },
            "fontFamily": {
                "inter": ["Sanuk", "sans-serif"],
            }
        },
    },
    plugins: [],
}

