/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      backgroundImage: {
        'secondary-gradient': 'linear-gradient(36.92deg, #1C4DA1 20.32%, #0040AE 28.24%)',
        'blue-gradient': 'linear-gradient(161.75deg, #1254C5 16.95%, #0040AE 31.1%)',
        'count-gradient': 'linear-gradient(150.73deg, #1254C5 24.55%, #0040AE 68.54%)'
      },
      colors: {
        'primary': '#F95C22',
        'light-orange': '#f15d22',
        'dark-orange': '#B63100',
        'hover-orange': '#FB9D7A',
        'secondary': '#164194',
        'blue-primary': '#40B5D1',
        'aqua': '#B1E0E5',
        'pearl': '#DBECF0',
        'grey': '#E7EAE3',
        'grey-2': '#DEDEDE',
        'yellow': '#FFD700',
        'yellow-2': '#FFF7CC',
        'dark-blue': '#1C4DA1',
        'hover-blue': '#0A42A1',
        'slate': '#5C656D'
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