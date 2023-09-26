
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url();?>register_assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form  id="form" action="" method="post" onsubmit="return validateInputs()">
      <div class="input-box">
        <input type="text" name="name"  id="username" placeholder="Enter your name" >
        <div class="formerr"></div>
      </div>
      <div class="input-box">
        <input type="email" name="email" id="email"  placeholder="Enter your email" >
        <div class="formerr"></div>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Create password" >
        <div class="formerr"></div>
      </div>
      <div class="input-box">
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" >
        <div class="formerr"></div>
      </div>
      
      <div class="input-box button">
        <input type="Submit" value="Register Now" id="sbmt">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login">Login now</a></h3>
      </div>
    </form>
    <div id="form-message"></div>
  </div>
  <script type = 'text/javascript' src = "<?php echo base_url();?>register_assets/validation.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        $("#form").submit(function (event) {
            event.preventDefault();
        //  if(validateInputs()){
            var formData = $(this).serialize();
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('form_controller/ajax_process_registration'); ?>",
                data: formData,
                dataType:"json",
                success: function (response) {
                    if (response.status=='true'){
                      //  alert(response)
                       // $("#form-message").html("Registration successful!");
                       alert("Registration successful!");
                       

                    } else {
                        $("#form-message").html("unsuccess");
                    }
                }
                
            });
          //}
        });
    });
</script>
</body>

</html>

















