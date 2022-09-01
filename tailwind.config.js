const colors = require('tailwindcss/colors')
const themeDefaults = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.slate,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                inter: ['Inter', ...themeDefaults.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}