//FUNCTION FOR SIGN UP AND SIGN IN BUTTON
var signUpButton = document.getElementById("signUp");
var signInButton = document.getElementById("signIn"); 
var container = document.getElementById("main");

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});



//FUNCTION FOR CONTACT NUMBER
const contact_number = document.getElementById("contact_number");
contact_number.addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, "");
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});



//FUNCTION FOR SIGN UP
function create_account() {
    var email = document.getElementById("email").value;
    var lastmail = "@gmail.com";
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var contact_number = document.getElementById("contact_number").value;
    var popup = document.getElementById("popup");
    var valid = document.getElementById("valid");
    var contact_length = document.getElementById("contact_length");
    var container = document.getElementById("main");
    var form_button = document.getElementById("form_button");
    var already_account = document.getElementById("already_account");
    var password_length = document.getElementById("password_length");

    $.ajax({
        url: "validate_acc.php",
        type: "GET",
        dataType: "json",
        data:{
            email: email
        },
        success: function(response){
            if(response.exist){
                already_account.classList.add("already_account-open");
                container.classList.add("container-main");
            }
            else{
                if (password !== confirm_password) {
                    popup.classList.add("open-popup-password");
                    container.classList.add("container-main");
                } 
                else if (!email.endsWith(lastmail)) {
                    valid.classList.add("open-valid-email");
                    container.classList.add("container-main");
                } 
                else if (contact_number.length < 11){
                    contact_length.classList.add("open-contact_number-length");
                    container.classList.add("container-main");
                }
                else if(password.length < 6){
                    password_length.classList.add("password_length-open");
                    container.classList.add("container-main");
                }
                else if(password === confirm_password && email.endsWith(lastmail)) {
                    form_button.click();
                }
            }
            
        }
    })
}

function popup_close(){
    popup.classList.remove("open-popup-password");
    container.classList.remove("container-main");
}

function valid_close(){
    valid.classList.remove("open-valid-email");
    container.classList.remove("container-main");
}

function contact_close(){
    contact_length.classList.remove("open-contact_number-length");
    container.classList.remove("container-main");
}

function already_close(){
    already_account.classList.remove("already_account-open");
    container.classList.remove("container-main");
}

function password_close(){
    password_length.classList.remove("password_length-open");
    container.classList.remove("container-main");
}

//FUNCTION FOR ALL ERROR WHEN LOGIN
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    if (error == '1') {
        document.getElementById('wait_for_admin').style.display = 'block';
        urlParams.delete('error');
        const newUrl = window.location.pathname + '' + urlParams.toString();
        history.replaceState({}, '', newUrl);
    }
    else if(error ==  '2'){
        document.getElementById('email_not_verified').style.display = 'block';
        urlParams.delete('error');
        const newUrl = window.location.pathname + '' + urlParams.toString();
        history.replaceState({}, '', newUrl);
    }
    else if(error == '3'){
        document.getElementById('wrong').style.display = 'block';
        urlParams.delete('error');
        const newUrl = window.location.pathname + '' + urlParams.toString();
        history.replaceState({}, '', newUrl);
    }
};



