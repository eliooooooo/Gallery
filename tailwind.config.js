/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.{html,php}"],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#4A2040',
          'light': '#9F6BA0',
        },
        secondary: {
          DEFAULT: '#EC9DED',
          'light': '#F5CCE8',
        }
      }
    },
  },
  plugins: [],
}

