//FUNCTION FOR ARROW 
function show(id, iconId,technician_email,email){
    let message_collapse = document.getElementById(id);
    let icon = document.getElementById(iconId);
    let techa = document.getElementById("techa");
    let endUser_email = document.getElementById("endUser_email");

    message_collapse.classList.toggle('message-open');
    icon.classList.toggle('fa-solid-open');
    $.ajax({
        url: "delete_appointment.php",
        type: "GET",
        dataType: "json",
        data:{
            technician_email: technician_email,
            email: email
        },
        success: function(response){
            techa.value = response.data.technician_email;
        }
    })
}

//FUNCTION FOR CHAT BUTTON
// function chats(endUser_email){
//     window.location.href = "chats.php?email=" + endUser_email;
// }

//FUNCTION FOR CANCEL BOOK BUTTON
function cancelbook(){
    var container = document.getElementById("container");
    var cancel_modal = document.getElementById("cancel_modal");

    container.classList.add("container-open");
    cancel_modal.classList.add("cancel_modal-open");
}

function close_modal(){
    container.classList.remove("container-open");
    cancel_modal.classList.remove("cancel_modal-open");
}

function delete_book(){
    var reason = document.getElementById("reason");

    reason.classList.add("reason-open");
    cancel_modal.classList.remove("cancel_modal-open");

}

function close_reason(){
    reason.classList.remove("reason-open");
    container.classList.remove("container-open");
}

//HIDE CANCEL BUTTON IF THE STATUS IS ACCEPTED
function hideCancelButton() {
    let status = document.getElementById("status");
    let cancelButton = document.getElementById("cancel_btn");

    if (status.textContent.trim() === "accepted") {
      
        cancelButton.style.display = "none";
    }
}
hideCancelButton();

function back(email){
    window.location.href = "endUser_page.php?email=" + email;
}