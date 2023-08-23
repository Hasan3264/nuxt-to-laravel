/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./nuxt.config.{js,ts}",
    "./app.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        popin:['Poppins']
      },
      screens: {
      'sm': '320px',
      // => @media (min-width: 576px) { ... }

      'md': '576px',
      // => @media (min-width: 960px) { ... }

      'lg': '768px',
      // => @media (min-width: 1440px) { ... }
      'xl': '992px',
      
      '2xl': '1200px',
    },
    },
  },
  plugins: [],
}