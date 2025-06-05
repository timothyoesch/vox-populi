/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './lang/*.json',
        "./resources/**/*.md"
    ],
    theme: {
        extend: {
            "colors": {
                "background": "#ffffff",
                "foreground": "#000000",
                "highlight": "#e84e1b",
                "secondary": "#FFDFFD",
            },
            "fontFamily": {
                "bernoru": ['Bernoru', 'sans-serif']
            },
        },
        plugins: [],
    }
}

