function GenerateRndPasswd(id){
    let pwdField = document.getElementById("newPwd"+id);
    pwdField.value = Math.random().toString(36).slice(2, 10);
}