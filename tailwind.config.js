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
                "vapkored": "#dd0a1e",
                "vapkogreen": "#3a7e2c",
                "vapkogrey": "#bfc4c4",
                "vapkobeige": "#FFF7EB",
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

