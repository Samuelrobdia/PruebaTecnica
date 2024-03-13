/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'regularred': '#D53535',
        'regulargreen': '#00B884'
      }
    },
  },
  plugins: [],
}

