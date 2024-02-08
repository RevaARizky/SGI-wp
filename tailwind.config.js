/**
 * Container Plugin - modifies Tailwind’s default container.
 */
const containerStyles = ({ addComponents }) => {
  const containerBase = {
    maxWidth: '100%',
    marginLeft: 'auto',
    marginRight: 'auto',
    paddingLeft: '30px',
    paddingRight: '30px',
    '@screen lg': {
      paddingLeft: '40px',
      paddingRight: '40px'
    },
    '@screen 2xl': {
      paddingLeft: '75px',
      paddingRight: '75px'
    }
  };

  addComponents({
    '.container': {
      ...containerBase,
      '@screen xl': {
        width: '100%',
        maxWidth: '1400px',
        paddingLeft: '3.75rem',
        paddingRight: '3.75rem',
      }
    },
    '.container-fluid': {
      ...containerBase,
      '@screen lg': {
        paddingLeft: '45px',
        paddingRight: '45px'
      }
    },
  });
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './footer.php',
    './header.php',
    './index.php',
    './single.php',
    './parts/**/*.php',
    './blocks/**/*.php',
    './src/scss/**/*.scss',
    './src/js/**/*.js',
    // './src/js/*.js',
  ],
  theme: {
    container: {
      center: true,
    },
    // fontSize: {
    //   '5xl': '2.75rem'
    // },
    fontFamily: {
      serif: ['"Span"', 'serif'],
      sans: ['"Open Sans"', 'sans-serif'],
      wedding: ['"Open Sans"', 'sans-serif'],
      montserrat: ['"Montserrat"', 'sans-serif'],
    },
    extend: {
      zIndex: {
        header: 999
      },
      colors: {
        'gray-1': '#111',
        'gray-2': '#222',
        'gray-3': '#333',
        'gray-4': '#444',
        'gray-6': '#666',
        'gray-8': '#888',
        'gray-9': '#999',
        'gray-d': '#ddd',
        'gray-f5': '#f5f5f5',
        primary: '#0069FF',
        'orange-theme': '#C8B273',
        'gray-theme': '#636569',
        'sgi': '#636569',
        'gray-shade': '#F5F6F6',
        'sgi-orange': '#D75C00',
        'sgi-footer': '#414A50',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    containerStyles,
  ],
  // important: true,
}

