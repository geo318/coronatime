/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./public/**/*.js",
    "./resources/**/*.vue",

  ],
  theme: {
    colors: {
        'app-gray' : '#E6E6E7',
        'app-blue' : '#2029F3',
        'app-green' : '#249E2C',
        'app-green-darker' : '#11b064',
        'app-white' : '#fff',
        'app-green-lite' : '#0FBA68',
        'app-red' : '#CC1E1E',
        'dark-gray' : '#808189',
    },
    extend: {},
  },
  plugins: [],
}
