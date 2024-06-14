var error = document.getElementById("error_message");
var success = document.getElementById("success_message");
var container = document.getElementById("main");
var form_button = document.getElementById("form_button");

function check(){
    let email = document.getElementById("email").value;
    $.ajax({
        url: 'forgot_password.php',
        type: 'GET',
        dataType: 'json',
        data: {
            email: email
        },
        success: function () {
            success.classList.add("error-open");
            container.classList.add("error-container");
        },
        error: function (){
            error.classList.add("error-open");
            container.classList.add("error-container");
        },
    });
}

function remove_delete(){
    error.classList.remove("error-open");
    container.classList.remove("error-container");
}

function remove_success(){
    success.classList.remove("error-open");
    container.classList.remove("error-container");
    form_button.click();
}