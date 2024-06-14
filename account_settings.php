<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account_settings.css">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <h1>Account Settings</h1>
        <hr>

        <div class="info">
            <label for="" class="change">Change Photo</label>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="file-input-container">
                <input type="file" name="profilePictureInput" id="profilePictureInput">
          </div>    
                <br>
                <label for="profilePictureInput" id="uploadLabel">Choose a file</label>
                <button type="submit" id="submit">Upload</button>
                
        </form>
     </div>  

        <form id="updateForm">
            <input type="text" id="fullName" class="fullname" placeholder="Full Name:">
            <input type="text" id="UserName" class="user" placeholder="Username:">
            <input type="text" id="Email" class="email" placeholder="Email:">
            <input type="text" id="address" class="address" placeholder="Address:">
            <input type="number" id="contact_number" class="number" placeholder="Phone Number:" min="0" max="99999999999" pattern="[0-9]{11}">
            <input type="text" id="TimeAvailability" class="time" placeholder="Time Availability:">
            <button type="submit" id="complete" name="save">Save</button> 
            <button type="cancel" id="cancel" name="cancel">Cancel</button> 
        </form>
    </div>

    
    </body>
    </html>