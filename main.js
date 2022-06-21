const form=document.querySelector(".send"),
input=form.querySelector(".messageInp"),
sendBtn=form.querySelector(".btn"),
chat=document.querySelector(".chat")

form.onsubmit=(e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr=new XMLHttpRequest();
   xhr.open("POST","php/main.php",true);
   xhr.onload=()=>{
       if(xhr.readyState==XMLHttpRequest.DONE){
           if(xhr.status==200){
               input.value="";
           }
       }
   }
   let formData=new FormData(form);
   xhr.send(formData);
}

setInterval(()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php/chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState==XMLHttpRequest.DONE){
            if(xhr.status==200){
                let data=xhr.response;
                chat.innerHTML=data;
            }
        }
    }
    let formData=new FormData(form);
   xhr.send(formData);
},500)