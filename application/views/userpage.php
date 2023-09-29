<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <title>User Page</title>
    <style>
       /* Example CSS for background and general styling */
body {
    margin: 0;
    padding: 0;
    background-image: url('your-background-image.jpg');
    background-size: cover;
    font-family: Arial, sans-serif;
}

/* Update the .box class with more meaningful naming */
.content-box {
    width: 900px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px auto;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}
/* Example CSS for the navigation bar */
.navbar {
    background-color: #333;
    color: #fff;
    padding: 15px 0;
    text-align: center; /* Center the text for mobile view */
}

.navbar h1 {
    margin: 0;
    font-size: 24px;
}

/* Update the .logout-btn class with more meaningful naming */
.logout-button {
    float: right;
    margin-top: 10px;
    background-color: #f44336;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left:100px
}

.logout-button:hover {
    background-color: #d32f2f;
}
/* Example CSS for form styling */
.form-container {
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px auto;
    padding: 20px;
    max-width: 600px; /* Adjust the max-width to your preference */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.form-container label {
    font-weight: bold;
}

.form-container select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


    </style>
     
</head>

<body>
    <div class="navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Welcome to Admin Page</h1>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('form_controller/logout'); ?>" class="btn btn-danger logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <form>
        <label for="first_dropdown">Select Subject:</label>
        <select id="first_dropdown" name="first_dropdown">
            <!-- Options for the first dropdown -->
            <option value="">Please Select Subject</option>
            
        </select>

        <label for="second_dropdown">Topics:</label>
        <select id="second_dropdown" name="second_dropdown">
            <!-- Options for the second dropdown will be populated dynamically -->
        </select>
    </form>

    <div class="container box">
        <div class="table-responsive">
            <br />
            <table id="user_data" class="table table-bordered table-striped" style="border:2px solid black">
                <thead  style="border:2px solid black">
                    <tr>
                        <th width="35%" style="border:2px solid black; background-color:antiquewhite">question</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Your JavaScript code -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
          //  var selectedOption = $(this).val();
          
            $.ajax({
                url: '<?php echo base_url('form_controller/getSubjects'); ?>',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    
                    if (data && data.length > 0) {
                        $('#first_dropdown').empty();
                        $('#first_dropdown').append('<option value="">Please Select Subject</option>');

                        $.each(data, function(index, subject) {
                            $('#first_dropdown').append($('<option>', {
                                value: subject.id,
                                text: subject.name
                            }));
                        });
                    } else {
                        $('#first_dropdown').empty();
                        $('#first_dropdown').append('<option value="">No subjects found</option>');
                    }
                },
                error: function() {
                    // Handle AJAX error here
                    alert("An error occurred while fetching subjects.");
                }
            });

            
        $('#first_dropdown').on('change', function() {
            var selectedOption = $(this).val();
            $.ajax({
                url: '<?php echo base_url('form_Controller/getTopics'); ?>',
                method: 'POST',
                data: {
                    selected_option: selectedOption
                },
                dataType: 'json',
                success: function(data) {
                    if (data && data.length > 0) {
                        $('#second_dropdown').empty(); // Clear existing options
                        $('#second_dropdown').append('<option value="">Select Topic</option>'); // Add a default option

                        // Add new options based on the AJAX response
                        $.each(data, function(index, topic) {
                            $('#second_dropdown').append($('<option>', {
                                value: topic.id,
                                text: topic.topic
                            }));
                        });
                    } else {
                        // Handle the case when no topics are found
                        $('#second_dropdown').empty();
                        $('#second_dropdown').append('<option value="">No topics found</option>');
                    }
                },
                error: function() {
                    // Handle AJAX error here
                    alert("An error occurred while fetching topics.");
                }
            });
        });
        $(function(){
            $("#second_dropdown").change(function(){

                var sub=$('#first_dropdown').val();
                var top=$('#second_dropdown').val();
                $.ajax({
                    url: '<?php echo base_url('form_Controller/getQuestion'); ?>',
                method: 'POST',
                data: {
                    "topic_id":top ,
                    "subject_id":sub
                },
                dataType:'json',
                success: function(data) {
                        if (data != 0) {
                            $.each(data, function(index, topic) {
                                $("#user_data").append("<tr><td>" + topic.question +
                                    "</td></tr>");
                            });

                        } else {
                            console.log(null);
                        }
                    },
                    error: function() {
                        alert("An error occurred while fetching topics.");
                    }
                });
            })
        });


      
    });
</script>



    <!-- <div class="container box">
        <div class="table-responsive">
            <br />
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th width="35%">Name</th>
                        <th width="35%">Email</th>
                        <th width="10%">Edit</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div> -->

    <!-- <script>
        $(document).ready(function () {
            $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url('crud_controller/getUsers'); ?>",
                    "type": "POST"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "edit" },
                ]
            });
        });
    </script> -->
   
</body>

</html>
