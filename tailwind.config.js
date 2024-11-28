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
        'grey-2': '#DEDEDE'
        
      },
      screens: {
        'tablet': '993px',
      },
      fontSize: {
        base: '1.125rem',
      },
      lineHeight: {
        'truly-normal': 'normal',  // Custom class for true line-height: normal
      },
    },
  },
  plugins: [],
};