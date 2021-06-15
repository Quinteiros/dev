const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {

  purge: [],

  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],

  purge: [
    './Modules/**/*.blade.php',
    './Modules/**/*.js',
    './Modules/**/*.vue',
  ],

  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
          sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  variants: {
    extend: {},
  },
  
  plugins: [
    // ...
    require('@tailwindcss/ui'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography')
  ],
}