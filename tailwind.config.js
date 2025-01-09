/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#F95C22',
        'light-orange': '#f15d22',
        'dark-orange': '#B63100',
        'secondary': '#164194',
        'blue-primary': '#40B5D1',
        'aqua': '#B1E0E5',
        'pearl': '#DBECF0',
        'grey': '#E7EAE3',
        'grey-2': '#DEDEDE',
        'grey-3': '#F2F2F8',
        'lime': '#99CC28',
        'black-light': '#00000080',
      },
      screens: {
        'xxs': '320px',
        'sm': '575px',
        'tablet': '993px',
        'md': '768px',
      },
      fontSize: {
        base: '1.125rem',
        'default': '16px',
        '40': '2.5rem',
      },
      lineHeight: {
        'truly-normal': 'normal', // Custom class for true line-height: normal
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'), // Add the forms plugin here
  ],
};
