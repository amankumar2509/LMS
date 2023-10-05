<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <title>User Page</title>

    <style>
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
            margin: 0 auto;
            /* Center the box horizontally */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            /* Add some top margin for spacing */
        }

        /* Example CSS for the navigation bar */
        .navbar {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }



        /* Example CSS for form styling */
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container select,
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container .login-button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-container .login-button:hover {
            background-color: #555;
        }

        .btn-word {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-word:hover {
            background-color: #286090;
        }

        .download-button {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            /* Add some margin for spacing */
            transition: background-color 0.3s ease;
            /* Add a smooth hover effect */
            margin-top: 5px;
            margin-right: 5px;
            margin-bottom: 5px;
            margin-left: 210px;
        }

        .download-button:hover {
            background-color: #286090;
        }
        #Dword{
            float:right;
            margin-right: 392px;
            margin-top: -46px;

        }

        #logout {
            position: absolute;
            top: 8px;
            right: 20px;
            background-color: #FF6347;
            color: #FF6347;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            /* Add some margin for spacing */
            transition: background-color 0.3s ease;
        }

        #logout:hover {
            background-color: #286090;
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
                <div class="col-md-6" id="logout">
                    <a href="<?php echo base_url('form_controller/logout'); ?>" class=".logout-button">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-box">
        <form class="form-container">
            <label for="first_dropdown">Select Subject:</label>
            <select id="first_dropdown" name="first_dropdown">
                <!-- Options for the first dropdown will be dynamically populated-->
                <option value="">Please Select Subject</option>
            </select>

            <br>

            <label for="second_dropdown">Select Topic:</label>
            <select id="second_dropdown" name="second_dropdown">
                <!-- Options for the second dropdown will be populated dynamically -->
                <option value="">Topic appear after selection of subject</option>
            </select>
            <label for="language_selection">Select language</label>
            <select id="language" name="language">
                <option value="0">Select language</option>
                <option value="1">English</option>
                <option value="2">Hindi</option>
            </select>




        </form>

        <form method="post" id="download_content_csv" action="">
            <button class="download-button">
                <i class="fa fa-download mr-2" aria-hidden="true"></i>
                Download CSV
            </button>

        </form>
        <form method="post" id="Dword" action="">
            <button class="download-button">
                <i class="fa fa-download mr-2" aria-hidden="true"></i>
                Download word
            </button>

        </form>
    </div>

    <!-- <div id="language_selection">
    <label for="language">Select Language:</label>
    <select id="language">
        <option value="english">English</option>
        <option value="hindi">Hindi</option>
    </select>
</div> -->

    <div class="container box">
        <div class="table-responsive">
            <br />
            <!-- <table id="user_data" class="table table-bordered table-striped" style="border: 2px solid black">
                <thead style="border: 2px solid black">
                    <tr>
                        <th width="35%" style="border: 2px solid black; background-color: antiquewhite">question</th>
                    </tr>
                </thead>
            </table> -->
            <table id="user_data" class="display" style="width:100%"></table>

        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function () {
            //  var selectedOption = $(this).val();

            $.ajax({
                url: '<?php echo base_url('form_controller/getSubjects'); ?>',
                method: 'POST',
                dataType: 'json',
                success: function (data) {

                    if (data && data.length > 0) {
                        $('#first_dropdown').empty();
                        $('#first_dropdown').append('<option value="">Please Select Subject</option>');

                        $.each(data, function (index, subject) {
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
                error: function () {
                    // Handle AJAX error here
                    alert("An error occurred while fetching subjects.");
                }
            });


            $('#first_dropdown').on('change', function () {
                var selectedOption = $(this).val();
                $.ajax({
                    url: '<?php echo base_url('form_Controller/getTopics'); ?>',
                    method: 'POST',
                    data: {
                        selected_option: selectedOption
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data && data.length > 0) {
                            $('#second_dropdown').empty(); // Clear existing options
                            $('#second_dropdown').append('<option value="">Select Topic</option>'); // Add a default option

                            // Add new options based on the AJAX response
                            $.each(data, function (index, topic) {
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
                    error: function () {
                        // Handle AJAX error here
                        alert("An error occurred while fetching topics.");
                    }
                });
            });

            $(document).ready(function () {
                $("#language").change(function () {

                    var sub = $('#first_dropdown').val();
                    var top = $('#second_dropdown').val();
                    var lang = $("#language").val();
                    var hrefa = "<?php echo base_url(); ?>form_Controller/get_csv/" + sub + "/" + top + "/" + lang;
                    $('#download_content_csv').attr('action', hrefa);
                    $('#download_content_csv').prop('disable', false);

                    var hrefac = "<?php echo base_url(); ?>form_Controller/get_word/" + sub + "/" + top + "/" + lang;
                    $('#Dword').attr('action', hrefac);
                    $('#Dword').prop('disable', false);


                    $.ajax({
                        url: '<?php echo base_url('form_Controller/getQuestion'); ?>',
                        method: 'POST',
                        data: {
                            "topic_id": top,
                            "subject_id": sub,
                            "lang_id": lang
                        },
                        dataType: 'json',
                        success: function (data) {
                            // if (data != 0) {
                            //     $.each(data, function(index, topic) {
                            //         $("#user_data").append("<tr><td>" + topic.question +
                            //             "</td></tr>");
                            //     });

                            // } else {
                            //     console.log(null);
                            // }
                            if (data.length > 0) {
                                var table = $('#user_data').DataTable({
                                    "bDestroy": true,
                                    dom: 'lBftrip',
                                    buttons: [
                                        'pdf'

                                    ],
                                    data: data,
                                    columns: [
                                        // { data: 'question' },
                                        // { data: 'option_1' }, 
                                        // { data: 'option_2' }, 
                                        // { data: 'option_3' },
                                        // { data: 'option_4' }  
                                        { data: 'question', title: 'Question' },
                                        { data: 'option1', title: 'Option' },
                                        { data: 'option2', title: 'Option' },
                                        { data: 'option3', title: 'Option' },
                                        { data: 'option4', title: 'Option' },
                                        { data: 'answer', title: 'Answer' }
                                    ],
                                    order: [0] //sort first column (question)
                                });
                            } else {
                                console.log("No data to display.");
                            }


                        },
                        error: function () {
                            alert("An error occurred while fetching topics.");
                        }
                    });
                })
            });
            //     $("#download_content_csv").click(function(e) {
            //     e.preventDefault();

            //     var top = $("#second_dropdown").val();
            //     var sub = $("#first_dropdown").val();
            //     $.ajax({
            //         url: '<?php echo base_url('form_Controller/get_csv'); ?>',
            //         method: 'POST',
            //         data: {
            //             "topic_id": top,
            //             "subject_id": sub
            //         },
            //        // dataType: 'json',
            //         success: function(data) {
            //             alert('file_downloaded successfully');
            //         },
            //         error: function() {
            //             alert("An error occurred.");
            //         }
            //     });

            // });



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