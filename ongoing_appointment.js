
function show(id, iconId, technician_email, email) {
    let messageCollapse = document.getElementById(id);
    let icon = document.getElementById(iconId);
    let techa = document.getElementById("cancelTecha");
    let endUserEmail = document.getElementById("cancelEndUserEmail");

    messageCollapse.classList.toggle('message-open');
    icon.classList.toggle('fa-solid-open');
    $.ajax({
        url: "delete_appointment.php",
        type: "GET",
        dataType: "json",
        data: {
            technician_email: technician_email,
            email: email
        },
        success: function (response) {
            techa.value = response.data.technician_email;
            endUserEmail.value = response.data.endUser_email;
        }
    })
}

function cancelBook() {
    var container = document.getElementById("container");
    var cancelModal = document.getElementById("cancelModal");

    container.classList.add("container-open");
    cancelModal.classList.add("cancel_modal-open");
}

function close_modal() {
    var container = document.getElementById("container");
    var cancelModal = document.getElementById("cancelModal");

    container.classList.remove("container-open");
    cancelModal.classList.remove("cancel_modal-open");
}

function accept(type_of_service, endUserEmail, endUserName, technicianEmail, date, time, appointmentId) {
    var price = document.getElementById('priceInput').value.trim();
    var confirmModal = document.getElementById('confirmModal');

    document.getElementById('confirmModalMessage').innerText = "Are you sure that you input the right amount?";
    confirmModal.style.display = 'block';

    document.getElementById('type_of_service').value = type_of_service;
    document.getElementById('endUser_email').value = endUserEmail;
    document.getElementById('endUser_name').value = endUserName;
    document.getElementById('technician_email').value = technicianEmail;
    document.getElementById('date').value = date;
    document.getElementById('time').value = time;
    document.getElementById('appointmentId').value = appointmentId;
}

function completeTransaction() {
    var price = document.getElementById('confirmAmountInput').value.trim();
    var confirmModal = document.getElementById('confirmModal');
    var priceModal = document.getElementById('priceModal');

    var type_of_service = document.getElementById('type_of_service').value;
    var endUserEmail = document.getElementById('endUser_email').value;
    var endUserName = document.getElementById('endUser_name').value;
    var technicianEmail = document.getElementById('technician_email').value;
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;
    var appointmentId = document.getElementById('appointmentId').value;

    if (price === '') {
        priceModal.style.display = 'block'; // Show the price modal
        return; // Stop further execution if price is empty
    }

    $.ajax({
        url: "complete_transaction.php",
        type: "POST",
        data: {
            endUser_email: endUserEmail,
            endUser_name: endUserName,
            technician_email: technicianEmail,
            date: date,
            time: time,
            appointmentId: appointmentId,
            price: price,
            type_of_service: type_of_service
        },
        success: function (response) {
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error completing transaction. Please try again.");
        }
    });

    confirmModal.style.display = 'none';
}

// Function to close the price modal
function closePriceModal() {
    var priceModal = document.getElementById('priceModal');
    priceModal.style.display = 'none';
}
document.addEventListener("DOMContentLoaded", function () {
    var confirmModal = document.getElementById('confirmModal');
    var completeButton = document.querySelector('.acceptBtn');

    completeButton.addEventListener('click', function () {
        var priceInput = document.getElementById('priceInput').value.trim();

        if (priceInput === '') {
            document.getElementById('confirmModalMessage').innerText = "Please enter the price before completing the transaction.";
            confirmModal.style.display = 'block';
        } else {
            document.getElementById('confirmModalMessage').innerText = "Are you sure that you input the right amount?";
            confirmModal.style.display = 'block';
        }
    });
});

function showConfirmModal() {
    var modal = document.getElementById("confirmModal");
    var modalContent = document.querySelector(".modal-content");

    var viewportWidth = window.innerWidth;
    var viewportHeight = window.innerHeight;
    var modalWidth = modalContent.offsetWidth;
    var modalHeight = modalContent.offsetHeight;
    var modalLeft = (viewportWidth - modalWidth) / 2;
    var modalTop = (viewportHeight - modalHeight) / 2;

    modal.style.left = modalLeft + "px";
    modal.style.top = modalTop + "px";

    modal.style.display = "block";
}

function closeConfirmModal() {
    var modal = document.getElementById("confirmModal");
    modal.style.display = "none";
}

var currentDate = new Date();

  // Format the date as YYYY-MM-DD
  var formattedDate = currentDate.getFullYear() + '-' + (currentDate.getMonth() + 1).toString().padStart(2, '0') + '-' + currentDate.getDate().toString().padStart(2, '0');

  // Set the value of the input field to the current date
  document.getElementById('date_today').value = formattedDate;

  document.addEventListener("DOMContentLoaded", function () {
    let accept = document.getElementById("accept");
    let date_today = document.getElementById("date_today").value;
    let apppoint_date = document.getElementById("apppoint_date").value;

    if(date_today !== apppoint_date){
        accept.style.display = "none";
    }
    else{
        accept.style.display = "block";
    }
  });