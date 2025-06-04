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
                "highlight": "#0E1F8B",
                "secondary": "#FFDFFD",
            },
            "fontFamily": {
                "bernoru": ['Bernoru', 'sans-serif']
            },
        },
        plugins: [],
    }
}

