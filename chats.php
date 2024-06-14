<?php
    require_once("dbcon.php");
    $email = $_GET['email'];

    $sql = "SELECT * FROM chats WHERE end_user_email = '$email'";
    $query = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    <link rel="website icon" href="icon/icon.png" type="png">
    <link rel="stylesheet" href="chats.css">
    <script src="https://kit.fontawesome.com/355342439a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="icon/icon.png" alt="" srcset="" height="50" width="100" onclick="back('<?php echo $email ?>')"><h1>- Locator Services</h1>
        </div>
        <hr>
        <h1>Chat Room</h1>
        <div class="chat_container">
            <div class="chat_info">
                <div class="inbox">
                    <h1>Inbox</h1>
                    <div class="new_message">
                        <label for="newMessage"><i class="fa-solid fa-plus"></i> </label>
                        <button id="newMessage" onclick="new_message()">New Message</button>
                        <label for="edit_inbox"><i class="fa-solid fa-pen-to-square"></i> </label>
                        <button id="edit_inbox">Edit Inbox</button>
                    </div>
                    <?php
                        while($row = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="inbox_messages active" id="no_message">
                        <img src="icon/icon.png" height="60" width="60"  alt="">
                        <div class="inbox_chat">
                            <h3>Ivan Policarpio</h3>
                            <p>Lorem ipsum dolor sit amet consecteturasdasdasd</p>
                        </div>
                    </div>
                    <?php
                        }
                    ?> 
                </div>

                <div class="chats">
                    <div class="chat_header">
                        <img src="icon/icon.png" height="50" width="50"  alt="">
                        <div class="active_now">
                            <h2>Ivan Policarpio</h2>
                            <div class="active_info">
                                <div class="activeNow">
                                    <p class="green_active"><i class="fa-solid fa-circle"></i></p>
                                    <p>Active Now</p>
                                </div>
                                <div class="not_active">
                                    <p class="dark_active"><i class="fa-solid fa-circle"></i></p>
                                    <p>Active 5mins ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="user_messages">
                        <div class="messages_info">
                            <div class="your_row">
                                <div class="your_message_info">
                                    <div class="your_message">
                                        <img src="icon/icon.png" height="35" width="35"  alt="">
                                        <p>Hi Yumi lore</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="my_row">
                                <div class="my_message_info">
                                    <div class="my_message">
                                        <p>Hello ivan Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti iusto rem sunt libero quae repellat temporibus reprehenderit quo consequatur natus quisquam saepe, autem, harum porro sequi dolores? Dolore, dicta dolor.</p>
                                        <img src="icon/icon.png" height="35" width="35"  alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="send_message">
                        <form action="" method="post">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Type here"></textarea>
                            <button><i class="fa-solid fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <div class="no_message" id="no_message">
                    <span><i class="fa-regular fa-message"></i></span>
                    <h1>No Messages, yet</h1>
                    <p>No messages in your inbox, yet! start chatting with our technician about your problem.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="newMessage_modal" id="newMessage_modal">
        <div class="new_message_info">
            <form action="new_message.php" method="post">
                <h1>New message</h1>
                <input type="hidden" name="end_user_email" value="<?php echo $email ?>">
                <label for="email">Email:</label>
                <input type="text" name="technician_email" id="email" autocomplete="off"><br>
                <div class="bagong_mensahe">
                    <label for="bagong_message">New Message:</label>
                    <textarea name="end_user_message" id="bagong_message" cols="30" rows="10" autocomplete="off"></textarea>
                </div>
                <div class="newMessage_button">
                    <button class="sendbtn" name="send">Send</button>
                    <button type="button" class="cancelbtn" onclick="close_modal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
<script src="chats.js"></script>
</body>
</html>