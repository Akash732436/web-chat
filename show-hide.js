const pass=document.querySelector("form input[type='password'"),
toggle=document.querySelector("form .input-details i");

toggle.onclick=()=>{
    if(pass.type == "password"){
        pass.type="text";
        toggle.classList.add("active");
    }else{
        pass.type="password";
        toggle.classList.remove("active");
    }
}