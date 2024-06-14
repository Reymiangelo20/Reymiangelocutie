//FUNCTION FOR ACCEPT BUTTON
function accept(){
    var accept_modal = document.getElementById("accept_modal");
    var container = document.getElementById("container");

    accept_modal.classList.add("accept_modal-open");
    container.classList.add("container-open");
}

function accept_no(){
    accept_modal.classList.remove("accept_modal-open");
    container.classList.remove("container-open");
}

//FUNCTION FOR DECLINED BUTTON
function declined(){
    var declined_modal = document.getElementById("declined_modal");

    declined_modal.classList.add("declined_modal-open");
    container.classList.add("container-open");
}

function declined_no(){
    declined_modal.classList.remove("declined_modal-open");
    container.classList.remove("container-open");
}

//FUNCTION FOR PROFILE PICTURE MODAL
function open_img(){
    var profilepic_modal = document.getElementById("profilepic_modal");

    profilepic_modal.classList.add("profilepic_modal-open");
}

function valid_img(){
    var validID_modal = document.getElementById("validID_modal");
    validID_modal.classList.add("profilepic_modal-open");
}

function business_img(){
    var businessPermit_modal = document.getElementById("businessPermit_modal");
    businessPermit_modal.classList.add("profilepic_modal-open");
}
function close_profile(){
    profilepic_modal.classList.remove("profilepic_modal-open");
    validID_modal.classList.remove("profilepic_modal-open");
    businessPermit_modal.classList.remove("profilepic_modal-open");
}
