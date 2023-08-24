/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            'logo': ['Gochi Hand', 'system-ui'],
        },
        extend: {},
    },
    plugins: [require("daisyui")],
}
