const colors = require('tailwindcss/colors')
const themeDefaults = require('tailwindcss/defaultTheme')

module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
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
                rubik: ['Rubik', ...themeDefaults.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}