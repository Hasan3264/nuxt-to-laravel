// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },

  css: ['~/assets/css/main.css',
    // 'swiper/css/swiper.css',
  ],
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
      // src: '~/plugins/swiper.js', mode: 'client' ,
    },
  },
})
