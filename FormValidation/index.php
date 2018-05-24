<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Company Form</title>
    <link rel="stylesheet" href="./style.css">
    <script>

    window.onload = function(){        
        function ValidateForm() {

            var hasError = false;
            //validare first name
            if (document.getElementById('firstname').value == "") {
                document.getElementById('wrongfirstname').style.display = "inline";
                hasError = true;
            } else {
                document.getElementById('wrongfirstname').style.display = "none";   
            }
            //validare last name
            if (document.getElementById('lastname').value == "") {
                document.getElementById('wronglastname').style.display = "inline";
                hasError = true;
            } else {
                document.getElementById('wronglastname').style.display = "none";   
            }
            //validare email
            if (document.getElementById('email').value.search(/^[a-zA-Z]+([_\.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+([\.-]?[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,4})+$/) == -1) {
                document.getElementById('wrongemail').style.display = "inline";
                hasError = true;
            } else {
                document.getElementById('wrongemail').style.display = "none";   
            }
            //validare phone
            if (document.getElementById('phone').value.search(/^\(?[\d]{3}\)?[\s-]?[\d]{3}[\s-]?[\d]{4}$/)) {
                document.getElementById('wrongphone').style.display = "inline";
                hasError = true;
            } else {
                document.getElementById('wrongphone').style.display = "none";   
            }    


            return !hasError;
        }

    document.getElementById('test').onsubmit = ValidateForm;
    }
    </script>
  </head>
  <body>
      
     <?PHP
        $email = $_POST["email"];
        $to = "carmenmaria.sima@yahoo.com";
        $subject = "New Email Address for Mailing List";
        $headers = "From: $email\n";

        $message = "A visitor to your site has sent the following email address to be added to your mailing list.\n

        Email Address: $email";

        $user = "$email";
        $usersubject = "Thank You";
        $userheaders = "From: carmenmaria.sima@yahoo.com\n";
        $usermessage = "Thank you for subscribing to our mailing list.";

        mail($to,$subject,$message,$headers);

        mail($user,$usersubject,$usermessage,$userheaders);
        
    ?>  
      
      
    <form id='test'>
        First Name *:
    <input id="firstname" type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" required><span id="wrongfirstname" class="error">* Please Insert a Valid First Name</span><br />
        Last Name *:
    <input id="lastname" type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" required><span id="wronglastname" class="error">* Please Insert a Valid Last Name</span><br />
        Email*
    <input id="email" type="text"><span id="wrongemail" class="error">* Please Insert a Valid Email Address</span><br />
        Phone*
    <input id="phone" type="text"><span id="wrongphone" class="error">* Please Insert a Valid Phone Number</span><br />
        Company*
        <select class="company" required>
              <option value=""></option>
              <option value="">Company 1</option>
              <option value="">Company 2</option>
              <option value="">Company 3</option>
              <option value="">Company 4</option>
        </select>
        <span id="wrongcompany" class="error">* No company chosen</span><br />

    <div>
        <input type="submit" value="Submit">
    </div>
        
   
    <?php
      header("Location: thankyou.html");  
    ?>
        
      
</form>

  </body>
</html>