const body = document.querySelector("body"),
    sidebar =  document.querySelector(".sidebar"),
    toggle = document.querySelector(".toggle"),
    searchBtn = document.querySelector(".search-box"),
    modeSwitch = document.querySelector(".toggle-switch"),
    modeText = document.querySelector(".mode-text");
/* DARK MODE BUTTON SCRIPT */
    modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark")

        if(body.classList.contains("dark")){
            modeText.innerText = "Light Mode"
        }else{
            modeText.innerText = "Dark Mode"
        }  
    });
/* Opening of Sidebar */
    toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
    })
