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
            'standard': ['Nunito', 'system-ui'],
        },
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [{
            light: {
                ...require("daisyui/src/theming/themes")["[data-theme=light]"],
                "primary": "#e779c1",
                "neutral": "#1a103c"
            },
        },
        {
            dark: {
                ...require( "daisyui/src/theming/themes" )["[data-theme=synthwave]"],
                "base-100": "#1f2937",
                "base-200": "#111827"
            }
        }],
        darkTheme: "dark"
    },
}
