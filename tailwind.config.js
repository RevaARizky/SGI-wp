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
  safelist: [
    'w-1/2',
    'h-1/2',
    'w-3/5',
    'h-3/5',
    'w-3/4',
    'h-3/4',
    'w-4/5',
    'h-4/5',
    {
      pattern:  /py-(0|6|8|10|12|24|32)/,
      variants: ['md']
    },
    {
      pattern: /grid-cols-(1|2|3|4)/,
      variants: ['md']
    }
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
      montserrat: ['"Montserrat"', 'sans-serif'],
    },
    extend: {
      inset: {
        'unset': 'unset'
      },
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
        'sgi-orange-shade': '#FF5700',
        'sgi-orange': '#D75C00',
        'sgi-footer-grey': '#696B6F',
        'sgi-dark-grey': '#414A50',
        'sgi-grey': '#636569',
        'sgi-white': '#fff',
        'sgi-white-shade': '#EFEFEF',
        'sgi-white-alt': '#F5F6F6'
      },
      fontSize: {
        "3xl": "1.625rem"
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    containerStyles,
  ],
  // important: true,
}

