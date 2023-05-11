/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  darkMode: 'class',
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

