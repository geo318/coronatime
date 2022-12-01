/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./public/**/*.js",
    "./resources/**/*.vue",

  ],
  theme: {
    extend: {
      colors: {
        'app-gray' : '#E6E6E7',
        'app-blue' : '#2029F3',
        'app-green' : '#249E2C',
        'app-green-darker' : '#11b064',
        'app-white' : '#fff',
        'app-green-lite' : '#0FBA68',
        'app-red' : '#CC1E1E',
        'dark-gray' : '#808189',
        'app-black' : '#010414',
        'app-yellow' : '#EAD621',
        'transparent': 'transparent',
        'app-gray-lite' : '#F6F6F7'
      },
      boxShadow: {
        'inner-gray': 'inset 0 -1px 1px 0px #F6F6F7',
      }
    },
  },
  plugins: [],
}
