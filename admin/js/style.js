function kiemtradangki1(){
    var check =/SV\d{4}$/g;
    var masv = document.getElementById("inputmasv").value;
    if(check.test(masv))
        {
            document.getElementById("error_message1").style.display='none';
            return true;
        }
    else {
        document.getElementById("error_message1").style.display='inline';
        return false;    
    }
}
///^0[13579]\d{8}$/g
function kiemtradangki2(){
    var check =/^(?:[A-Z][a-z\s]*)*$/g;
    var hoten = document.getElementById("inputhoten").value;
    if(check.test(hoten))
        {document.getElementById("error_message2").style.display='none';
        return true;
    }
    else {document.getElementById("error_message2").style.display='inline';
    return false;
}
}
function kiemtradangki3(){
    var check =/^19[0-9][0-9]|2[0-1][0-1][0-9]$/g;
    var namsinh = document.getElementById("inputnamsinh").value;
    if(check.test(namsinh))
        {document.getElementById("error_message3").style.display='none';return true;}
    else {document.getElementById("error_message3").style.display='inline';return false;}
}
function kiemtradangki4(){
    var check =/^0[13579]\d{8}$/g;
    var sdt= document.getElementById("inputSDT").value;
    if(check.test(sdt))
        {document.getElementById("error_message4").style.display='none';return true;}
    else {document.getElementById("error_message4").style.display='inline';return false;}
}
function kiemtradangki5(){
    var check =/^[a-z]*$/g;
    var diachi= document.getElementById("inputdiachi").value;
    if(check.test(diachi))
        {document.getElementById("error_message5").style.display='none';return true;}
    else {document.getElementById("error_message5").style.display='inline';return false;}
}
function kiemtradangki6(){
    var check = /^[A-Za-z][\w$.]+@[\w]+\.\w+$/g;
    var email= document.getElementById("inputemail").value;
    if(check.test(email))
        {document.getElementById("error_message6").style.display='none';return true;
    }
    else {document.getElementById("error_message6").style.display='inline';return false;}
}

function Isvalidform(){
    var masv=   kiemtradangki1();
    var name=   kiemtradangki2();
    var namsinh=kiemtradangki3();
    var sdt=    kiemtradangki4();
    var diachi= kiemtradangki5();
    var email=  kiemtradangki6();

    if (masv && name && namsinh && sdt && diachi && email) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function kiemtra2(){
    var check =/^[0-9]*$/g;
    var nam = document.getElementById("txmonth2").value;
    if(check.test(nam))
        return true;
    else 
    return false;
}