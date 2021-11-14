let mailCheckbox=document.getElementById('send');
mailCheckbox.onchange=function(e){
    if (mailCheckbox.checked){
        document.querySelector('.e-mail').style.display='flex';
        document.getElementById('email').required=true;
    }else{
        document.querySelector('.e-mail').style.display='none';
        document.getElementById('email').required=false;
    }
}

let sendCheckbox = document.getElementById('agreement');
sendCheckbox.onchange = function(e){
    if(!mailCheckbox.checked) document.getElementById('email').required=false;
        if (sendCheckbox.checked){
            document.getElementById('submit').disabled=false;
        }else
            document.getElementById('submit').disabled=true;
    }

let email = document.getElementById('email');
if (email.value.length > 0){
    mailCheckbox.click();
}