<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #passchange {
            background-color: #fff;
            border: 1px solid #ccc;
            max-width: 370px;
            padding: 90px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the form container */
        #form {
            text-align: center;
        }

        /* Style the input boxes */
        .input-box {
            margin: 10px 0;
        }

        .input-box label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        /* Style the error messages */
        .formerr {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Style the submit button */
        .button {
            text-align: center;
        }

        .button input {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover effect for the submit button */
        .button input:hover {
            background-color: #2980b9;
        }
    </style>

<body>
    <div id="passchange">
        <form id="form" action="<?php  echo base_url('form_controller/processpasswordchange') ?>" method="post" >

            <div class="input-box">
                <label for="password">Current Password</label>
            
                <input type="password" name="oldpass" id="oldpass" placeholder="Enter your current password">
                <div class="formerr"></div>
            </div>
            <br>
            <div class="input-box">
            <label for="password">New Password</label>
                <input type="password" name="newpassword" id="newpassword" placeholder="Create new password">
                <div class="formerr"></div>
            </div>
            <br>
            <div class="input-box">
            <label for="password">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password">
                <div class="formerr"></div>
            </div>

            <div class="input-box button">
                <input type="Submit" value="change Password" id="sbmt">
            </div>

        </form>

    </div>
</body>

</html>