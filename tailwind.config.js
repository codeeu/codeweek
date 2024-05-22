/** @type {import('tailwindcss').Config} */
export default {
  presets: [
		require('./vendor/tallstackui/tallstackui/tailwind.config.js'),

	],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/tallstackui/tallstackui/src/**/*.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [

	],
}

