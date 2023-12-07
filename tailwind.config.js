const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    safelist: [
       
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                serif: ["unity-headline"],
            },
            fontSize: {
                '4.5xl': '2.5rem',
            },
            colors: {
                'primary-dark': '#013265',
                'primary-light': '#F9F9F9',
                'primary-light-blue': '#0DB3DC',
                'primary-blue' : '#1F5FA2',
                'secondary-light-blue': '#58DCFF',
                'secondary-blue': '#0BA7E0',
                'gray-cacaca': '#CACACA',
                'secondary-gray': '#607080',
                'secondary-gray-dark': '#326',
                'kiks-white': '#FFFFFF',
                'primary-cyan': '#0BFFF0',
            },
            width: {
                'content': '1440px',
            },
          
            gap: {
                '15': '5rem',
                '30': '12rem',
            },
            spacing: {
                '10rem': '10rem',
            },
            borderRadius: {
                '30': '30px'
            },
            lineHeight: {
                '13': '3rem',
                '14': '4rem',
            },
            gridTemplateAreas: {
                'cookies': [
                    'text more link' 
                ],
                'cookies-mobile': [
                    'text text',
                    'more link'
                ]
            },
            screens: {
                'xs': '475px',
                'heightmd': { 'raw': '(max-height: 920px)' }, // => @media (max-height: 920px) { ... }
            }
        },
    },
    plugins: [
        function({ addBase, theme }) {
          function extractColorVars(colorObj, colorGroup = '') {
            return Object.keys(colorObj).reduce((vars, colorKey) => {
              const value = colorObj[colorKey];
    
              const newVars =
                typeof value === 'string'
                  ? { [`--color${colorGroup}-${colorKey}`]: value }
                  : extractColorVars(value, `-${colorKey}`);
    
              return { ...vars, ...newVars };
            }, {});
          }
    
          addBase({
            ':root': extractColorVars(theme('colors')),
          });
        },
        require('@tailwindcss/forms'), require('@savvywombat/tailwindcss-grid-areas')
      ],
};
