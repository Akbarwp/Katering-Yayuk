/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        // backgorund: '#E1F2F7',
        // primary: '#EF0D50',
        // secondary: '#EB3A70',
        // light: '#E5BACE',
        // dark: '#1e222e',

        primary: '#417175',
        secondary: '#FD9A6B',
        light: '#ECE9DB',
        dark: '#345254',
      },
      fontFamily: {
        sarabun: 'Sarabun',
        kurenaido: '"Zen Kurenaido"'
      },
    },
    container: {
      center: true,
      padding: '16px',
    },
  },
  plugins: [
    require("daisyui")
  ],

  daisyui: {
    // themes: [
    //   {
    //     mytheme: {
    //       "base-100": "#ECE9DB",
    //     },
    //   },
    // ],
  },

}
