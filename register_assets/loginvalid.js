$(document).ready(function () {
    function validateEmail(email) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }
  
    function validatePassword(password) {
      return password.length >= 6; 
    }
  
    $("#form").submit(function (e) {
      e.preventDefault(); 

      const email = $("#email").val();
      const password = $("#password").val();
  
      $(".formerr").text("");
  
      if (!validateEmail(email)) {
        $("#email + .formerr").text("Invalid email address");
        return;
      }
  
      if (!validatePassword(password)) {
        $("#password + .formerr").text("Password must be at least 6 characters long");
        return;
      }
  
    });
  });
  