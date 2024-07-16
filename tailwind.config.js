/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            "colors": {
                "background": "#FAE2E2",
                "accent": "#D34954"
            },
            "fontFamily": {
                "futura": ["Futura", "sans-serif"],
                "graph": ["Graph", "sans-serif"],
            }
        },
    },
    plugins: [],
}

