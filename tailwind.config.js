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
        'primary': '#ebe9d3'
      },
      fontFamily: {
        'poppins': 'Poppins, sans-serif'
      },
      fontSize: {
        'xxs': '10px'
      },
    },
  },
  plugins: [],
}

