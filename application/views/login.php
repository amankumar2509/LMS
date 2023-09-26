
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title> 
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url();?>register_assets/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form  id="form" action="" method="post"  >
      <div class="input-box">
        <input type="text" name="email"  id="email" placeholder="Enter your name"  autocomplete="off">
        <div class="formerr"></div>
      </div>
      
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder=" password" autocomplete="off" >
        <div class="formerr"></div>
      </div>
      <div class="input-box button">
        <input type="Submit" value="login Now">
      </div>
      <div id="msg"></div>
      
    </form>
  </div>
  <script type="text/javascript">
     $(document).ready(function () {
    $('#form').submit(function (e) { 
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('form_controller/ajax_login'); ?>",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.data == 'true') {
                    $("#msg").text("Login success");
                    window.location.href = response.url;
                } else {
                    $("#msg").text("Login failed!");
                    // window.location.href = 'login.php';
                }
            }
        });
    });
});

  </script>
</body>

</html>

















