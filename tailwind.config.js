module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
      colors: {
        'purple-mazze': '#8B11D6',
      },
      spacing: {
        '72': '18rem'
      }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography')
  ],
  experimental: {
    applyComplexClasses: true
  }
}