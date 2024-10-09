/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/*.{html,php}"],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#312c30',
          'light': '#9F6BA0',
        },
        secondary: {
          DEFAULT: '#f6cdf7',
          'light': '#f5e9f1',
        }
      }
    },
  },
  plugins: [],
}

