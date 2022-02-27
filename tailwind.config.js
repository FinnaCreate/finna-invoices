module.exports = {
    content: ['./*/*.php', './**/*.php', './resources/css/*.css', './resources/js/*.js', './safelist.txt'],
    corePlugins: {
        preflight: false
    },
    theme: {
        extend: {},
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px'
        }
    }
}
