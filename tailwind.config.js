/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        myTheme: {
          "primary": "#2f56aa",
          

 
          "secondary": "#f4e477",
                    
          
           
          "accent": "#e570a1",
                    
          
           
          "neutral": "#1D1820",
                    
          
           
          "base-100": "#FCFCFD",
                    
          
           
          "info": "#9CB7DE",
                    
          
           
          "success": "#3FCF8A",
                    
          
           
          "warning": "#CF8517",
                    
          
           
          "error": "#FB133A",
        }
      }
    ]
  }
}