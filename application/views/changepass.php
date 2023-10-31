<?php include('application\views\template\sidenav.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur">
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur">
    <style>
        
        /* Add the styles for the password change form here */
        body {
            background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
            background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
            background-attachment: fixed;
            background-repeat: no-repeat;
            font-family: 'Vibur', cursive;
            font-family: 'Abel', sans-serif;
            opacity: .95;
            margin: 0;
        }

        #passchange {
            width: 450px;
            min-height: 500px;
            height: auto;
            border-radius: 5px;
            margin: 12% auto;
            box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
            padding: 2%;
            background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #passchange .con {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: space-around;
            justify-content: space-around;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 auto;
        }

        #passchange header {
            margin: 2% auto 10% auto;
            text-align: center;
        }

        #passchange header h2 {
            font-size: 250%;
            font-family: 'Playfair Display', serif;
            color: #3e403f;
        }

        #passchange header p {
            letter-spacing: 0.05em;
        }

        .input-box {
        margin: 10px 0;
    }

    label {
        font-weight: bold;
    }

    input[type="password"] {
        width: 130%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Style for the submit button */
    .input-box.button input[type="submit"] {
        background-color: #3e403f;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 36%;
    }

    .input-box.button input[type="submit"]:hover {
        background-color: #555;
    }


        @keyframes ani9 {
            0% {
                transform: translateY(3px);
            }
            100% {
                transform: translateY(5px);
            }
        }
        .formerr {
            color: red;
        }

        
    </style>
</head>
<body>
    <div id="passchange">
        <form id="form" action="<?php echo base_url('form_controller/processpasswordchange') ?>" method="post" onsubmit="return validateForm();">
            <div class="input-box">
                <label for="password">Current Password</label>
                <br>
                <input type="password" name="oldpass" id="oldpass" placeholder="Current password">
                <div class="formerr" id="oldpassErr"></div>
            </div>
            <br>
            <div class="input-box">
                <label for="password">New Password</label>
                <br>
                <input type="password" name="newpassword" id="newpassword" placeholder="New password">
                <div class="formerr" id="newpasswordErr"></div>
            </div>
            <br>
            <div class="input-box">
                <label for="password">Confirm Password</label>
                <br>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password">
                <div class="formerr" id="cpasswordErr"></div>
                <br>
            </div>
            <div class="input-box button">
                <input type="submit" value="Submit" id="sbmt">
            </div>
        </form>
    </div>


    
   <script>
    function validateForm(){


        document.getElementById('oldpassErr').textContent='';
        document.getElementById('newpasswordErr').textContent='';
        document.getElementById('cpasswordErr').textContent='';


        var oldpass=document.getElementById('oldpass').value;
        var newpassword=document.getElementById('newpassword').value;
        var cpassword=document.getElementById('cpassword').value;

        var valid=true;

        if(oldpass===""){
            document.getElementById("oldpassErr").textContent="Current password required";
            valid=false;      
        }
        if(newpassword===""){
            document.getElementById("newpasswordErr").textContent="New password required";
            valid=false;
        }
        if(newpassword!==cpassword){
            document.getElementById("cpasswordErr").textContent="Password did not match";
            valid=false;
        }
        if (!valid) {
            event.preventDefault();
        }
        return valid;
    }
    </script>
   
</body>

</html>
