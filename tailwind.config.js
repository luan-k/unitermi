module.exports = {
  purge: false,//["./**/*.html", "./**/*.js", "./**/*.php"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        purple: {
          light: "#f5e8f6",
          dark: "#6639b6",
        },
        unitermi: {
					primary: {
						red: "#d20a11",
						redDark: "#a51a1d",
						blue: "#104274",
						dark: "#2b2b2b",
						gray: "#827f7e",
						graylight: "#f2f2f0",
						white: "#FFFFFF",
					},
					secondary: {
						green: "#00a982",
						yellow: "#ffce00",
						blue: "#5ec4e7",
						pink: "#f08494",
					},

        },
        orange: {
          light: "#f29163",
          dark: "#f05922",
        },
        gray:{
          light: "#f5f5f5",
          dark: "#4a4552",
        },
				green: {
          primary: "#448044",
        },
        dark: {
          primary: "#181C18",
        },
        light: {
          primary: "#D0E5EC",
        },
        /*  primary: "#002e65", */
        /* light: {
          primary: "#D0E5EC",
        }, */
        /*  primary: "#002e65", */
      },
      fontFamily: {
        '"poppins"': ["Poppins", "sans-serif"],
        'josefin-sans': ["Josefin Sans", "sans-serif"],
        'montserrat': ["montserrat", "sans-serif"],
        'dancing-script': ["Dancing Script", "cursive"],
      },
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        lg: "7%",
        xl: "8%",
        "2xl": "10%",
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ["active"],
    },
  },
  plugins: [],
};
