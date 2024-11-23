let ShowLogin = (message) => {
    document.getElementsByClassName("login")[0].style.display = "flex" ;
    document.getElementsByClassName("register")[0].style.display = "none" ;
    document.getElementsByClassName("RegisterButton")[0].style.display = "flex"
    document.getElementsByClassName("loginButton")[0].style.display = "none"
    document.getElementById("message-formulaire").innerHTML = message
}
let ShowRegister = (message) => {
    document.getElementsByClassName("login")[0].style.display = "none" ;
    document.getElementsByClassName("register")[0].style.display = "flex" ;
    document.getElementsByClassName("loginButton")[0].style.display = "flex"
    document.getElementsByClassName("RegisterButton")[0].style.display = "none"
    document.getElementById("message-formulaire").innerHTML = message
}