//FUNCTION FOR TIMER
var timer = document.getElementById('timer');
var resend = document.querySelector(".resend");
var seconds = 30;
var timerInterval = setInterval(() => {
    seconds--;

    timer.textContent = seconds + 's' ;

    if (seconds <= 0) {
        clearInterval(timerInterval);
        resend.style.visibility = 'visible';
        timer.style.visibility = 'hidden';
    }
}, 1000);

//FUNCTION FOR RESEND CODE
function newverification(){
    var email = document.getElementById("email").value;
    var sending = document.getElementById("sending");
    $.ajax({
        url: 'resend_code.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email
        },
        success: function () {
            location.reload();
        },
    });
    resend.style.visibility='hidden';
    sending.style.visibility='visible';
 
}


//FUNCTION FOR VERIFICATION CODE COMPLETE
function submit(){
    var verification_code = document.getElementById("verification_code").value;
    var user_input = document.getElementById("user_input").value;
    var modal = document.getElementById("modal");
    var success = document.getElementById("success");
    var container = document.getElementById('container');
    var technician = document.getElementById('technician').value;
    var technician_modal = document.getElementById("technician_modal"); 

    if(user_input !== verification_code){
        modal.classList.add("open-modal");
        container.classList.add("open-container");
    }
    else if(technician === 'technician'){
        technician_modal.classList.add("success_technician-open");
        container.classList.add("open-container");
    }
    else{
        success.classList.add("open-success");
        container.classList.add("open-container");
    }
}

function remove(){
    modal.classList.remove("open-modal");
    container.classList.remove("open-container")
}

function remove_success(){
    var form_button = document.querySelector(".form_button");
    
    technician_modal.classList.remove("success_technician-open");
    success.classList.remove("open-success");
    container.classList.remove("open-container");
    form_button.click();
}

