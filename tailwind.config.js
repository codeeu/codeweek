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
        'light-blue-gradient': 'linear-gradient(161.75deg, #33C2E9 16.95%, #00B3E3 31.1%)',
        'count-gradient': 'linear-gradient(150.73deg, #1254C5 24.55%, #0040AE 68.54%)',
        'orange-gradient': 'linear-gradient(36.92deg, #F95C22 20.32%, #FF885C 28.24%)',
        'violet-gradient': 'linear-gradient(247deg, #410098 22.05%, #6733AD 79.09%)',
        'yellow-transparent-gradient': 'linear-gradient(90deg, #FFFBE5 35%, #00000000 90%)',
        'yellow-transparent-opposite-gradient': 'linear-gradient(90deg, #00000000 10%, #FFFBE5 65%)'
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
        'yellow-50': '#FFFBE5',
        'dark-blue': '#1C4DA1',
        'hover-blue': '#0A42A1',
        'slate': '#5C656D',
        'slate-500': '#333E48',
        'light-blue': '#F2FBFE',
        'error-200': '#E30519',
        'dark-blue-50': '#E8EDF6',
        'dark-blue-200': '#A4B8D9',
        'dark-blue-300': '#7794C7',
        'dark-blue-400': '#4971B4',
        'grey-3': '#F2F2F8',
        'lime': '#99CC28',
        'black-light': '#00000080',
        'light-blue-100': '#CCF0F9'
      },
      fontFamily: {
        blinker: ['Blinker', 'sans-serif'],
      },
      screens: {
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
        'truly-normal': 'normal',  // Custom class for true line-height: normal
      },
    },
  },
  plugins: [],
};