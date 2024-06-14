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

//REVIEW RATING
$(function () {
 
    $("#rateYo").rateYo({
      normalFill: "#A0A0A0",
      starWidth: "20px"
    });
   
  });

  //
  document.addEventListener("DOMContentLoaded", function() {
    let ratingInput = document.getElementById("rating");
    let rateYoInstance = $("#rateYo").rateYo({
        starWidth: "20px" // Adjust the size of the stars here
    });

    $("#rateYo").rateYo("option", "onChange", function (rating, rateYoInstance) {
        ratingInput.value = rating;
    });

    ratingInput.addEventListener('input', function(){
        let ratingValue = this.value;
        rateYoInstance.rateYo("rating", parseFloat(ratingValue));
    });
});

//HIDE CANCEL BUTTON IF THE STATUS IS ACCEPTED
function showReview() {
    let status = document.getElementById("status").value;
    let review = document.getElementById("review");

    if (status === "1") {
        review.style.display = "block";
    } else {
        review.style.display = "none";
    }
}

showReview();

