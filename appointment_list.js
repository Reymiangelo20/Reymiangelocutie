//FUNCTION FOR ARROW 
function show(id, iconId,technician_email,email, transaction_number){
    let message_collapse = document.getElementById(id);
    let icon = document.getElementById(iconId);
    let techa = document.getElementById("techa");
    let transaction = document.getElementById("transaction");
    let endUser_email = document.getElementById("endUser_email");
    let endUser_name = document.getElementById("endUser_name");
    let tech_name = document.getElementById("tech_name");

    message_collapse.classList.toggle('message-open');
    icon.classList.toggle('fa-solid-open');
    $.ajax({
        url: "delete_appointment_list.php",
        type: "GET",
        dataType: "json",
        data:{
            technician_email: technician_email,
            email: email,
            transaction_number: transaction_number
        },
        success: function(response){
            techa.value = response.data.technician_email;
            transaction.value = response.data.transaction_number;
            endUser_email.value = response.data.endUser_email;
            endUser_name.value = response.data.endUser_name;
            tech_name.value = response.data.technician_name;
        }
    })
}

//FUNCTION FOR CHAT BUTTON
function chats(endUser_email){
    window.location.href = "chats.php?email=" + endUser_email;
}

//FUNCTION FOR CANCEL BOOK BUTTON
function cancelbook(){
    var container = document.getElementById("container");
    var cancel_modal = document.getElementById("cancel_modal");

    container.classList.add("container-open");
    cancel_modal.classList.add("cancel_modal-open");
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

function close_modal(){
    container.classList.remove("container-open");
    cancel_modal.classList.remove("cancel_modal-open");
}

//FUNCTION FOR ACCEPT BUTTON
function accept(type_of_service, end_user_contact,endUser_email, endUser_name, technician_email, date, time, appointmentId) {
    let update_endUser_message = document.getElementById("update_endUser_message").value;
    let accepted = document.getElementById("accepted").value;

    $.ajax({
        url: "accept_appointment.php",
        type: "POST",
        data: {
            endUser_email: endUser_email,
            endUser_name: endUser_name,
            technician_email: technician_email, 
            date: date, 
            time: time, 
            appointmentId: appointmentId,
            update_endUser_message: update_endUser_message,
            accepted:accepted,
            end_user_contact: end_user_contact,
            type_of_service: type_of_service
        },
        success: function(response) {
            location.reload();
        },

    });
}


//HIDE ACCEPT BUTTON IF THE STATUS IS ACCEPTED
function hideAcceptButton() {
    let status = document.getElementById("status");
    let acceptButton = document.getElementById("acceptBtn");

    if (status.textContent.trim() === "accepted") {
      
        acceptButton.style.display = "none";
    }
}
hideAcceptButton();

//FUNCTION FOR SEE THE LOCATION OF TECHNICIAN
function seeLocation(address){
    //let technician_location = document.getElementById("technician_location").value;
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let currentLatitude = position.coords.latitude;
            let currentLongitude = position.coords.longitude;
            let googleMapsUrl = "https://www.google.com/maps/dir/?api=1&origin=" + currentLatitude + "," + currentLongitude + "&destination=" + encodeURIComponent(address);

            window.open(googleMapsUrl, "_blank");
        });
    }
}

window.onload = function(){
    let reason_select = document.getElementById("reason_select");
    let others = document.getElementById("others");

    reason_select.addEventListener("change", function(){
        if(reason_select.value === "Others"){
            reason_select.style.display = "none";
            others.style.display = "block";
        }
        else{
            others.style.display="none";
        }
    });
};