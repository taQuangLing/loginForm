function change_status_sign_up(){
        document.getElementById("form1").style.display = 'block';
        document.getElementById("form2").style.display = 'none';
        var sign_up = document.getElementById("sign_up").style;
        var sign_in = document.getElementById("sign_in").style;
        sign_up.marginBottom = 0;
        sign_up.height = '45px';
        sign_up.background = '#d6fff6';
        sign_up.borderRadius =  0;
        sign_up.borderTopLeftRadius = '7px';
        sign_up.borderTopRightRadius = '7px';
        sign_in.background = '#8aff75';
        sign_in.height =  '40px';
        sign_in.borderRadius = '7px';
}
function change_status_sign_in(){
        document.getElementById("form1").style.display = 'none';
        document.getElementById("form2").style.display = 'block';
        var sign_up = document.getElementById("sign_up").style;
        var sign_in = document.getElementById("sign_in").style;
        sign_in.marginBottom = 0;
        sign_in.height = '45px';
        sign_in.background = '#d6fff6';
        sign_in.borderRadius =  0;
        sign_in.borderTopLeftRadius = '7px';
        sign_in.borderTopRightRadius = '7px';
        sign_up.background = '#8aff75';
        sign_up.height =  '40px';
        sign_up.borderRadius = '7px';
}
function sign_in(){
    return false;
}
function sign_up(){
    return false;
}
//kiểm tra các giá trị nhập vào....









/*
function check_space(field){
    var sign_up = document.forms["sign_up"];
    if (field == "")check = 0;
    else
    check = 1;
    boolean = 1;
    if (field == "name" || field == ""){
        if (sign_up["name"].value == "" ){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            if (check == 1)return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if (field == "password" || field == ""){
        if (sign_up["password"].value == ""){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            if (check == 1)return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if (field == "email" || field == ""){
        if (sign_up["email"].value == ""){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            if (check == 1)return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if (field == "job" || field == ""){
        if (sign_up["job"].value == ""){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            if (check == 1)return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if (field == "age" || field == ""){
        if (sign_up["age"].value == ""){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if (field == "passwordConfirm" || field == ""){
        if (sign_up[field].value == "" || sign_up[field].value != sign_up["password"].value){
            boolean = 0;
            document.getElementById(field).style.backgroundImage = 'url(img/x.png)';
            return false;
        }
        else
        {
            document.getElementById(field).style.backgroundImage = 'url(img/v.png)';
            if (check == 1)return true;
        }
    }
    if(boolean == 0)return false;
    return true;
    
}
*/

function check_space(name_field){
    var sign_up = document.forms["sign_up"];
    if (name_field == "passwordConfirm"){
        if (sign_up[name_field].value != sign_up['password'].value 
        || sign_up[name_field].value == '' 
        || sign_up['password'].value == ''){
            document.getElementById(name_field).style.backgroundImage = 'url(img/x.png)';
            document.getElementById("password").style.backgroundImage = 'url(img/x.png)';
            return false;
        }
        document.getElementById(name_field).style.backgroundImage = 'url(img/v.png)';
        document.getElementById("password").style.backgroundImage = 'url(img/v.png)';
        return true;
    }
    if (sign_up[name_field].value == ''){
        document.getElementById(name_field).style.backgroundImage = 'url(img/x.png)';
        return false;
    }
    document.getElementById(name_field).style.backgroundImage = 'url(img/v.png)';
    return true;
}




function check_sign_up()
{
    var key = true;
    key = check_space('name');
    key = check_space('email');
    key = check_space('password');
    key = check_space('passwordConfirm');
    key = check_space('age');
    key = check_space('job');
    key = check_space('sex');
    return key;
}