const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */

export default {
  presets: [
    require('./vendor/tallstackui/tallstackui/tailwind.config.js')
  ],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/tallstackui/tallstackui/src/**/*.php',
    './app/Http/Livewire/**/*Table.php',
    './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
    './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
  ],
  theme: {
    extend: {
      colors: {
        'logorhnb': '#281f4f',
        "pg-primary": colors.gray,
      },
    },

  },
  plugins: [
    require("@tailwindcss/forms")({
      strategy: 'class',
    }),
  ],
}

