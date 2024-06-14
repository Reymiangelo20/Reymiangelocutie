let image = document.getElementById("image");
let input = document.getElementById("input");

input.onchange = function(){
    image.src = URL.createObjectURL(input.files[0])
}


//FUNCTION FOR CONTACT NUMBER LENGTH
let contact_number = document.getElementById("contact_number");
contact_number.addEventListener("input", function (){
    let value = this.value.trim();
    if(value.length > 11){
        this.value = value.slice(0,11);
    }
});


function back(email){
    window.location.href = "endUser_page.php?email=" + email;
}