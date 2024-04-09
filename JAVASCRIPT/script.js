const email = document.getElementById("email")
const emailReg=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const button= document.getElementById("button")
const password = document.getElementById("password")
const passwordReg= /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?"]).{9,}$/;
button.addEventListener("click", function(e) {
    if (email.value===""){
        e.preventDefault()
        alert("Fill out this field")
        email.style.borderColor="red";
    } else if (!emailReg.test(email.value)){
        alert("Invalid input format")
        email.style.borderCcolor="red"; 
    } else if (password.value===""){
        alert("Fill out this field")
        password.style.borderColor="red";
    } else if (!passwordReg.test(password.value)){
        alert("Invalid input format")
        password.style.borderColor="red";
    } else {
        email.style.borderColor= "green";
        password.style.borderColor="green";
    }
}

)