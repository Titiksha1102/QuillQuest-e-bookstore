function validate(){
var t1=document.getElementById("t1")
var t2=document.getElementById("t2")
var t3=document.getElementById("t3")
var t4=document.getElementById("t4")
var p=document.getElementsByTagName('p')
var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;  //Javascript reGex for Email Validation.
var regPhone=/^\d{10}$/;                                        // Javascript reGex for Phone Number validation.
var regName = /\d+$/g; 
if (t1.value == "" || !regName.test(t1.value)) {
    p[0].innerHTML= "Please enter your name properly."
    return false;
}
if (t2.value== "" || !regEmail.test(t2.value)) {
    p[1].innerHTML="Please enter a valid e-mail address."
    
    return false;
}
if (t3.value == "" || !regPhone.test(t3.value)) {
    p[2].innerHTML= "Please enter valid phone number."
    
    return false;
}
if (t4.value == "") {
    p[3].innerHTML = "Please enter your password"
    
    return false;
}

if((t4.value).length <8){
    p[3].innerHTML= "Password should be atleast 6 character long"

    return false;

}
}