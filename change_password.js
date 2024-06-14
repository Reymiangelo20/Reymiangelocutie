function changepass(){
    let current_pass = document.getElementById('current_pass').value;
    let current_pass_input = document.getElementById('current_pass_input').value;
    let new_pass = document.getElementById('new_pass').value;
    let confirm_pass = document.getElementById('confirm_pass').value;
    let alert_current = document.getElementById('alert_current');
    let alert_invalid = document.getElementById('alert_invalid');
    let submit = document.getElementById('submit');

    if(current_pass != current_pass_input){
        alert_current.style.display = "block";
        alert_invalid.style.display="none";
    }
    else if(new_pass != confirm_pass){
        alert_invalid.style.display="block";
        alert_current.style.display = "none";
    }
    else{
        submit.click();
    }
}

function back(email){
    window.location.href = "endUser_page.php?email=" + email;
}