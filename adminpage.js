//FUNCTION FOR REMOVE 
function remove(user_id){
    var container = document.getElementById("container");
    var remove_modal = document.getElementById("remove_modal");
    var set_value = document.getElementById("set_value");
    
    set_value.value = user_id;
    remove_modal.classList.add("remove_modal-open");
    container.classList.add("table-container-open");
}

function no(){
    remove_modal.classList.remove("remove_modal-open");
    container.classList.remove("table-container-open");
}