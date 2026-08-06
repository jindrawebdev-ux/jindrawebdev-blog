/** Mirrors the tailwind.config block that was inline in includes/head.php */
module.exports = {
  content: [
    "../../site-files/**/*.php",
    "../../site-files/**/*.html",
    "../**/*.php",
    "../blog-data/content/*.html",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          dark: '#768473',
          light: '#9BAD98',
          offwhite: '#F5F5F5',
          charcoal: '#333333',
          cream: '#FBFAF7',
          white: '#ffffff'
        }
      },
      fontFamily: {
        serif: ['"Libre Baskerville"', 'serif'],
        sans: ['"Lato"', 'sans-serif']
      },
      boxShadow: {
        soft: '0 24px 70px rgba(51, 51, 51, 0.10)',
        card: '0 16px 50px rgba(118, 132, 115, 0.14)'
      }
    }
  },
  plugins: [],
}
