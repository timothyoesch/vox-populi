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
                "accent": "#2E0045",
                "highlight": "#F3FF47",
            },
            "fontFamily": {
                "anton": ['Anton', 'sans-serif']
            },
        },
        plugins: [],
    }
}

