// const inboxMessages = document.querySelectorAll('.inbox_messages');
//  inboxMessages.forEach(message => {
//      message.addEventListener('click', () => {
//          inboxMessages.forEach(msg => {
//              msg.classList.remove('active');
//          });
//          message.classList.add('active');
//          const userName = message.querySelector('h3').textContent;

//          document.querySelector('.chat_header h2').textContent = userName;
//      });
//  });

//FUNCTION FOR BACK TO END USER
function back(email){
    window.location.href="endUser_page.php?email="+email
}

//FUNCTION FOR DISPLAY NO MESSAGE MODAL WHEN THERE IS NO DATA IN INBOX
document.addEventListener("DOMContentLoaded", function() {
    var inboxMessages = document.querySelectorAll('.inbox_messages');
    var noMessage = document.getElementById('no_message');
    var chats = document.querySelector('.chats');

    if (inboxMessages.length === 0) {
        noMessage.style.display = 'block';
        chats.style.display = 'none';
    } 
    else{
        noMessage.style.display = 'none';
        chats.style.display = 'block';
    }
});

//FUNCTION FOR NEW MESSAGE
function new_message(){
    var newMessage_modal = document.getElementById("newMessage_modal");

    newMessage_modal.classList.add("newMessage_modal-open");
}

function close_modal(){
    newMessage_modal.classList.remove("newMessage_modal-open");
}

