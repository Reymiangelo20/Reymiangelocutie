//FUNCTION FOR CHANGING DIV DATA TO FILE NAME
let input = document.getElementById("profile_input");
let file = document.getElementById("file_name");

input.addEventListener("change",() => {
    file.innerHTML = input.files[0].name;
});

let valid = document.getElementById("valid");
let file_valid = document.getElementById("file_valid");

valid.addEventListener("change",() => {
    file_valid.innerHTML = valid.files[0].name;
});

let business_permit = document.getElementById("business_permit");
let file_business = document.getElementById("file_business");

business_permit.addEventListener("change",() => {
    file_business.innerHTML = business_permit.files[0].name;
});

let resume = document.getElementById("resume");
let file_cv = document.getElementById("file_cv");

resume.addEventListener("change",() => {
    file_cv.innerHTML = resume.files[0].name;
});

//FUNCTION FOR CONTACT NUMBER LENGTH
let contact_number = document.getElementById("contact_number");
contact_number.addEventListener("input", function (){
    let value = this.value.trim();
    if(value.length > 11){
        this.value = value.slice(0,11);
    }
});

//FUNCTION FOR WRONG PASSWORD
function check(){
    let password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    let lastmail = "@gmail.com";
    let email = document.getElementById("email").value;
    let profile_input = document.getElementById("profile_input").value; 
    let valid = document.getElementById("valid").value; 
    let resume = document.getElementById("resume").value; 
    let upload_form = document.getElementById("upload_form");
    let contact_number = document.getElementById("contact_number").value;

    var wrong_pass = document.getElementById("wrong_pass");
    var container = document.getElementById("container");
    var wrong_email = document.getElementById("wrong_email");
    var empty = document.getElementById("empty"); 
    var contact = document.getElementById("contact"); 
    var already_account = document.getElementById("already_account");
    var password_length = document.getElementById("password_length");

    $.ajax({
        url: "validate_acc.php",
        type: "GET",
        dataType: "json",
        data:{
            email: email
        },
        success: function(response){
            if(response.exist){
                already_account.classList.add("already_account-open");
                container.classList.add("container-main");
            }
            else{
                if(password !== confirm_password){
                    wrong_pass.classList.add("wrong_pass-open");
                    container.classList.add("container-main");
                }
                else if(!email.endsWith(lastmail)){
                    wrong_email.classList.add("wrong_email-open");
                    container.classList.add("container-main");
                }
                else if(profile_input == '' || valid == ''||  resume == ''){
                    empty.classList.add("wrong-empty");
                    container.classList.add("container-main");
                }
                else if(contact_number.length < 11){
                    contact.classList.add("wrong-contact");
                    container.classList.add("container-main");
                }
                else if(password.length < 6){
                    password_length.classList.add("password_length-open");
                    container.classList.add("container-main");
                }
                else if(password === confirm_password){
                    upload_form.click();
                }
            }
        }
    })

    
}

function password_close(){
    password_length.classList.remove("password_length-open");
    container.classList.remove("container-main");
}

function remove(){
    wrong_pass.classList.remove("wrong_pass-open");
    wrong_email.classList.remove("wrong_email-open");
    empty.classList.remove("wrong-empty");
    contact.classList.remove("wrong-contact");
    container.classList.remove("container-main");
}

function already_close(){
    already_account.classList.remove("already_account-open");
    container.classList.remove("container-main");
}


//FUNCTION FOR DROPDOWN REGION - PROVINCE
document.getElementById("region").addEventListener("change", function(){
let region = this.options[this.selectedIndex].getAttribute('data-region-code');
let province = document.getElementById("province");

$.ajax({
    url: "get_provinces.php",
    type: "GET",
    dataType: "json",
    data:{
        region: region
    },
    success: function(response){
        province.innerHTML = "";
        var default_option = document.createElement("option");
        default_option.value = "";
        default_option.textContent = "Select Province";
        province.appendChild(default_option);

        response.forEach(function(item) {
            var option = document.createElement("option");
            option.value = item.province_description;
            option.setAttribute('data-province-code', item.province_code);
            option.textContent = item.province_description;
            province.appendChild(option);
        });
    }
})
})

//FUNCTION FOR DROPDOWN PROVINCE - CITY
document.getElementById("province").addEventListener("change", function(){
    let province = this.options[this.selectedIndex].getAttribute('data-province-code');
    let cities = document.getElementById("city");
    
    $.ajax({
        url: "get_cities.php",
        type: "GET",
        dataType: "json",
        data:{
            province: province
        },
        success: function(response){
            cities.innerHTML = "";
            var default_option = document.createElement("option");
            default_option.value = "";
            default_option.textContent = "Select City";
            cities.appendChild(default_option);
    
            response.forEach(function(item) {
                var option = document.createElement("option");
                option.value = item.city_municipality_description;
                option.setAttribute('data-city-code', item.city_municipality_code);
                option.textContent = item.city_municipality_description;
                cities.appendChild(option);
            });
        }
    })
})
//FUNCTION FOR DROPDOWN CITY - BARANGAY
document.getElementById("city").addEventListener("change", function(){
    let city = this.options[this.selectedIndex].getAttribute('data-city-code');
    let barangay = document.getElementById("barangay");
    
    $.ajax({
        url: "get_barangay.php",
        type: "GET",
        dataType: "json",
        data:{
            city: city
        },
        success: function(response){
            barangay.innerHTML = "";
            var default_option = document.createElement("option");
            default_option.value = "";
            default_option.textContent = "Select Barangay";
            barangay.appendChild(default_option);
    
            response.forEach(function(item) {
                var option = document.createElement("option");
                option.value = item.barangay_description;
                option.setAttribute('data-barangay-code', item.region_code);
                option.textContent = item.barangay_description;
                barangay.appendChild(option);
            });
        }
    })
})

document.getElementById("status").addEventListener('change', function() {
    let status = this.value;
    let business_name = document.querySelector(".business_name");
    let social_link_label = document.getElementById("social_link_label");
    let business_permit = document.querySelector(".business_permit");
    let social_media_input = document.getElementById('social_media');

    if(status === "Freelancer"){
        business_name.style.display = "none";
        social_link_label.textContent = "Social Media Link";
        business_permit.style.display = "none";
        social_media_input.style.marginLeft = ""
    }
    else if(status === ""){
        social_link_label.textContent = "Social Media Link";
        social_media_input.style.marginLeft = "";
        business_permit.style.display = "block";
        business_name.style.display = "block";
    }
    else{
        business_name.style.display = "block";
        social_link_label.textContent = "Business Link";
        business_permit.style.display = "block";
        social_media_input.style.marginLeft = "53px"
    }
})