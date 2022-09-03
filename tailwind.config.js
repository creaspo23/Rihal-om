module.exports = {
    purge: [],
    theme: {
        fontFamily: {
            'base': 'Inter',
            // 'base-ar': 'Tajawal' // I love this font for arabic
        },
        extend: {
            screens: {
                'dark': {'raw': '(prefers-color-scheme: dark)'},
                // => @media (prefers-color-scheme: dark) { ... }
              }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms'),
    ],
};
