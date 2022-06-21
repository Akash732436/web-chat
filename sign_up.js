const form=document.querySelector(".wrapper-signup form"),
continueBtn=form.querySelector(".end input");
errorTxt=form.querySelector(".error-text");
form.onsubmit=(e)=>{
    e.preventDefault();
}
continueBtn.onclick=()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/sign_up.php",true);
    xhr.onload=()=>{
       if(xhr.readyState==XMLHttpRequest.DONE){
           if(xhr.status==200){
               let data=xhr.response;
               if(data == "success"){
                //console.log("done");
                confirm("Succesfully signed up");
                location.href= "login.php";
               }else{
                     errorTxt.textContent=data;
                     errorTxt.style.display="block";
               }
           }
       }
    }
    let formData=new FormData(form);
    xhr.send(formData);
}
