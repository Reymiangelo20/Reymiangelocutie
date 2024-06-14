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
            endUser_email.value = response.data.endUser_email;
           
        }
    })
}



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

//FUNCTION FOR COMPLETE BUTTON

function accept(endUserEmail, endUserName, technicianEmail, date, time, appointmentId) {
    $.ajax({
        url: "complete_transaction.php", // Corrected URL
        type: "POST",
        data: {
            endUser_email: endUserEmail, // Corrected parameter names
            endUser_name: endUserName,
            technician_email: technicianEmail, 
            date: date, 
            time: time, 
            appointmentId: appointmentId 
        },
        success: function(response) {
            alert(response); 
            location.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error accepting appointment. Please try again."); 
        }
    });
}