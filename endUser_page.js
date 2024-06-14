//FUNCTION FOR STARS IN TECHNICIAN RATING
$(document).ready(function () {
    $(".rateYo").each(function() {
        var ratingValue = $(this).data('rating');
        $(this).rateYo({
            rating: ratingValue, 
            starWidth: "20px",
            readOnly: true 
        });
    });
});


//FUNCTION FOR SEARCHBAR
function searchCard() {
    let input = document.getElementById("searchbar").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let technician_name = card.querySelector("h3").innerText.toLowerCase();
        let technician_position = card.querySelector("label").innerText.toLowerCase();
        let technician_location = card.querySelector(".loc").innerText.toLowerCase();
        if (technician_name.includes(input)) {
            card.style.display = "block";
        }
        else if (technician_position.includes(input)){
            card.style.display = "block";
        }
        else if(technician_location.includes(input)){
            card.style.display = "block";
        }
         else {
            card.style.display = "none";
        }
    });
}

document.getElementById("searchbar").addEventListener("input", searchCard);


//FUNCTION FOR CHECKBOX
function filter() {
    let electrician = document.getElementById("electrician").checked;
    let computer_technician = document.getElementById("computer_technician").checked;
    let barangay = document.getElementById("barangay").value.toLowerCase();
    let province = document.getElementById("province").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let position = card.querySelector("label").textContent;
        let location_brgy = card.querySelector("#loc_brgy").textContent.trim().toLowerCase();
        let location_province = card.querySelector("#loc_province").textContent.replace(/^,|,$/g, '').trim().toLowerCase();

        if (((position === "Electrician" && electrician) || (position === "Computer Technician" && computer_technician)) && ((barangay === '' || barangay === location_brgy) && (province === '' || province === location_province))) {
            card.style.display = "block";
        } else if (!electrician && !computer_technician &&
            ((barangay === '' || barangay === location_brgy) && (province === '' || province === location_province))) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

document.getElementById("electrician").addEventListener("change", filter);
document.getElementById("computer_technician").addEventListener("change", filter);
document.getElementById("barangay").addEventListener("change", filter);
document.getElementById("province").addEventListener("change", filter);


//PROFILE PICTURE AND USERNAME FUNCTION WHEN USER CLICK
function btnClick(){
    let btnProfile = document.getElementById("profile");
    btnProfile.click();
}
document.getElementById("profile_picture").addEventListener("click", btnClick);

function profile(){
    let profile_modal = document.getElementById("profile_modal")
    profile_modal.classList.toggle("open-profile");
}


//FUCNTION FOR BOOK NOW MODAL
function book(user_id){
    var book_now = document.getElementById('book_now');
    let firstname = document.getElementById('firstname');
    let book_profile = document.getElementById('book_profile');
    let technician_position = document.getElementById('technician_position');
    let location = document.getElementById('location');
    let description = document.getElementById('service_description');
    let tech = document.getElementById('tech');
    let time_available = document.getElementById('time_available');
    let technician_name = document.getElementById('technician_name');
    let technician_contact = document.getElementById('technician_contact');
    let technician_social = document.getElementById('technician_social');
    let technician_location = document.getElementById('technician_location');
    let user_id_hidden = document.getElementById("user_id_hidden");
    let position = document.getElementById("position");
    let ipapagawa = document.getElementById("ipapagawa");
    let ipapagawa2 = document.getElementById("ipapagawa2");

    $.ajax({
        url: "book_now.php",
        type: "GET",
        dataType: "json",
        data:{
            user_id: user_id
        },
        success: function(response){
            firstname.textContent = response.data.first_name + ' ' +  response.data.last_name;
            book_profile.src = response.data.profile_picture;
            technician_position.textContent = response.data.position;
            location.textContent = response.data.barangay + ', ' + response.data.province;
            description.textContent = response.data.service_description;
            tech.value = response.data.email;
            time_available.textContent = 'Time Available:'+ ' '+ response.data.time_availability;
            technician_name.value = response.data.first_name + ' ' +  response.data.last_name;
            technician_contact.value = +'0' + response.data.contact_number
            technician_social.value = response.data.social_media
            technician_location.value = response.data.address + ' ' + response.data.barangay + ' ' + response.data.city + ' ' + response.data.province;
            user_id_hidden.value = response.data.user_id;
            position.value = response.data.position;
            book_now.classList.add("book-now-open");
            
            if(time_available.textContent === 'Time Available: '){
                time_available.textContent = "Time Available: ---";
            }
        }
    })
}


function close_book(){
    book_now.classList.remove("book-now-open");
}

//REVIEW RATING
$(function () {
 
    $("#rateYo").rateYo({
      normalFill: "#A0A0A0",
      starWidth: "20px"
    });
   
  });

  
//FUNCTION FOR BOOK NOW
function booking(){
    // let endUser_email = document.getElementById("endUser_email").value;
    // let endUser_message = document.getElementById("endUser_message").value;
    // let tech = document.getElementById("tech").value;
    // let technician_message = document.getElementById("technician_message").value;
     var success_modal = document.getElementById("success_modal");
     var container = document.getElementById("container");
    // let date = document.getElementById('date').value;
    // let time = document.getElementById('time').value;
    // let technician_name = document.getElementById('technician_name').value;
    // let endUser_name = document.getElementById('endUser_name').value;
    // let pending = document.getElementById('pending').value;
    // let technician_contact = document.getElementById('technician_contact').value;
    // let technician_social = document.getElementById('technician_social').value;

    // $.ajax({
    //     url: "book_appointment.php",
    //     type: "POST",
    //     dataType: "json",
    //     data:{
    //         endUser_email: endUser_email,
    //         endUser_message: endUser_message,
    //         tech: tech,
    //         technician_message: technician_message,
    //         date: date,
    //         time: time,
    //         technician_name: technician_name,
    //         endUser_name: endUser_name,
    //         pending: pending,
    //         technician_contact: technician_contact,
    //         technician_social: technician_social
    //     },
    //     success: function(){
             success_modal.classList.add("success_booking-open");
             container.classList.add("container-open");
            
    //     }
    // })
}

function close_booking(){
    success_modal.classList.remove("success_booking-open");
    container.classList.remove("container-open");
}



//FUNCTION FOR DATE AND TIME FOR APPOINTMENT
//  var now = new Date();
//  var year = now.getFullYear();
//  var month = now.getMonth() + 1; 
//  var day = now.getDate();

//  var hours = now.getHours();
//  var minutes = now.getMinutes();
//  var am_pm = hours < 12 ? 'AM' : 'PM';
//  hours = hours % 12;
//  hours = hours ? hours : 12;



// var current_date = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
// var current_time = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes + ' ' + am_pm;
// document.getElementById('date').value = current_date;
//document.getElementById('time').value = current_time;


//FUNCTION FOR SEE THE LOCATION OF TECHNICIAN
function seeLocation(){
    let technician_location = document.getElementById("technician_location").value;
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let currentLatitude = position.coords.latitude;
            let currentLongitude = position.coords.longitude;
            let googleMapsUrl = "https://www.google.com/maps/dir/?api=1&origin=" + currentLatitude + "," + currentLongitude + "&destination=" + encodeURIComponent(technician_location);

            window.open(googleMapsUrl, "_blank");
        });
    }
}


//CHECK IF THE TECHNICIAN IS ALREADY HAVE 3 APPOINTMENTS
function appoint(){
    let date = document.getElementById("date").value;
    var submit = document.getElementById("submit");
    var future_date = document.getElementById("future_date");
    let current_date = document.getElementById("current_date").value;
    let technician_email = document.getElementById("tech").value;
    var fully_book = document.getElementById("fully_book");
    var success_book = document.getElementById("success_book");
    let endUser_email = document.getElementById("endUser_email").value;
    let ipapagawa = document.getElementById('ipapagawa').value;
    let ipapagawa2 = document.getElementById('ipapagawa2').value;
    let others = document.getElementById('others').value;
    var fill_service = document.getElementById('fill_service');
    let service_category = document.getElementById("service_category").value;
    let time = document.getElementById("time").value;
    var time_modal = document.getElementById("time_modal");
    var home_modal = document.getElementById("home_modal");
   
    

    $.ajax({
        url: "check_appointment.php",
        type: "GET",
        dataType: "json",
        data:{
            technician_email: technician_email,
            endUser_email: endUser_email,
            date: date
        },
        success: function(response){
            if(date === current_date || date <= current_date){
                future_date.classList.add("future_date-open");
                success_modal.classList.remove("success_booking-open");
            } 
            else if(ipapagawa === '' && ipapagawa2 === '' && others === ''){
                fill_service.classList.add("fill_service-open")
                success_modal.classList.remove("success_booking-open");
            }
            else if(time === ''){
                time_modal.classList.add("time_modal-open");
                success_modal.classList.remove("success_booking-open");
            }
            else if(service_category === ""){
                home_modal.classList.add("home_modal-open");
                success_modal.classList.remove("success_booking-open");
            }

            else if(response.success){
                success_book.classList.add("success_book-open");
                success_modal.classList.remove("success_booking-open")
            } 
            else {
                fully_book.classList.add("fully_book-open");
                success_modal.classList.remove("success_booking-open");
            }
        },
    });
}


function close_future(){
    future_date.classList.remove("future_date-open");
    success_modal.classList.add("success_booking-open");
    fully_book.classList.remove("fully_book-open");
}

function close_success(){
    submit.click()
    success_book.classList.remove("success_book-open");
  
}

function close_fill(){
    fill_service.classList.remove("fill_service-open");
    success_modal.classList.add("success_booking-open");
}

function close_time(){
    time_modal.classList.remove("time_modal-open");
    success_modal.classList.add("success_booking-open");
}

function close_home(){
    home_modal.classList.remove("home_modal-open");
    success_modal.classList.add("success_booking-open");
}

       
document.addEventListener("DOMContentLoaded", function() {
    let ratingInput = document.getElementById("rating");
    let rateYoInstance = $("#rateYo").rateYo(); 

    $("#rateYo").rateYo("option", "onChange", function (rating, rateYoInstance) {
        ratingInput.value = rating;
    });
    ratingInput.addEventListener('input', function(){
        let ratingValue = this.value;
        rateYoInstance.rateYo("rating", parseFloat(ratingValue));
    });
});

function see_comment(){
    let user_id_hidden = document.getElementById("user_id_hidden").value;
    let endUser_email = document.getElementById('endUser_email').value;
    let technician_email = document.getElementById('tech').value;

    window.location.href = "review.php?email=" +endUser_email + "&user_id=" + user_id_hidden + "&technician_email=" + technician_email;
}

window.onload = function() {
    var position_select = document.getElementById("position_select");
    var ipapagawa = document.getElementById("ipapagawa");
    var ipapagawa2 = document.getElementById("ipapagawa2");
    var others = document.querySelector(".others");

    position_select.addEventListener("change", function() {
        if (position_select.value === "Electric") {
            ipapagawa.style.display = "none";
            others.style.display = "none";
            ipapagawa2.style.display = "block";
            
        } else {
            others.style.display = "none";
            ipapagawa.style.display = "block";
            ipapagawa2.style.display = "none";
        }
    });
};


document.addEventListener("DOMContentLoaded", function() {
    var ipapagawa1 = document.getElementById("ipapagawa");
    var ipapagawa2 = document.getElementById("ipapagawa2");
    var othersInput = document.querySelector(".others");

    ipapagawa1.addEventListener("change", function() {
        if (this.value === "Others") {
            othersInput.style.display = "block";
            ipapagawa1.style.display = "none";
            
        } else {
            othersInput.style.display = "none";
            ipapagawa1.style.display = "block";
        }
    });

    ipapagawa2.addEventListener("change", function() {
        if (this.value === "Others") {
            othersInput.style.display = "block";
            ipapagawa2.style.display = "none";
        } else {
            othersInput.style.display = "none";
            ipapagawa2.style.display = "block";
        }
    });
    });

