function GenerateRndPasswd(id){
    let pwdField = document.getElementById("newPwd"+id);
    pwdField.value = Math.random().toString(36).slice(2, 10);
}
function pwd2text(id){    
    let toText = document.getElementById("newPwd"+id);
    toText.type="text";
}
function back(id){
    let toText = document.getElementById("newPwd"+id);
    toText.type="password";
}