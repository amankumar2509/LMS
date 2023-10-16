<?php include('application\views\template\sidenav.php') ?>
<main id="main" class="main">

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


        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <title>User Page</title>

        <style>
            body {
                margin: 0;
                padding: 0;

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

            #Dword {
                float: right;
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

            .img-icon {
                width: 20px;
            }

            .form-container {
                background-color: rgba(255, 255, 255, 0.8);
                border: 1px solid #ccc;
                border-radius: 5px;
                margin: 20px auto;
                padding: 20px;
                max-width: 600px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }

            .dropdown-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .dropdown-box {
                flex: 0 0 calc(33.33% - 10px);
                /* Adjust the width and spacing as needed */
                margin-bottom: 10px;
            }

            .dropdown-container label {
                display: block;
                font-weight: bold;
            }

            .dropdown-container select {
                width: 100%;
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            #addquest {
                margin-left: 40%;
            }

            #overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                /* Semi-transparent black background */
                z-index: 1;
            }

            #popup-form {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: #fff;
                padding: 20px;
                z-index: 2;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }

            #close-popup {
                margin-left: 92%;
            }
        </style>
    </head>

    <body>

        <form class="form-container">
            <div class="dropdown-container">
                <div class="dropdown-box">
                    <label for="first_dropdown">Select Subject:</label>
                    <select id="first_dropdown" name="first_dropdown">
                        <option value="">Please Select Subject</option>
                    </select>
                </div>

                <div class="dropdown-box">
                    <label for="second_dropdown">Select Topic:</label>
                    <select id="second_dropdown" name="second_dropdown">
                        <option value="">Topic appears after the selection of the subject</option>
                    </select>
                </div>

                <div class="dropdown-box">
                    <label for="language_selection">Select Language:</label>
                    <select id="language" name="language">
                        <option value="0">Select language</option>
                        <option value="1">English</option>
                        <option value="2">Hindi</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-dark" id="addquest" disabled>Add Question</button>
            <button type="button" class="btn btn-dark" id="search">Search</button>
        </form>
        <div id="overlay" style="display: none;"></div>

        <div id="popup-form" class="form-container" style="display: none;">

            <button id="close-popup">&#x2716</button>
            <h2>Add Question</h2>
            <label for="question">Question:</label>
            <input type="text" id="question" name="question">
            <label for="option">option_1:</label>
            <input type="text" id="option_1" name="option_1">
            <label for="option">option_2:</label>
            <input type="text" id="option_2" name="option_2">
            <label for="option">option_3:</label>
            <input type="text" id="option_3" name="option_3">
            <label for="option">option_4:</label>
            <input type="text" id="option_4" name="option_4">
            <label for="answer">Answer:</label>
            <input type="text" id="answer" name="answer">
            <label for="language">LangugeID:</label>
            <input type="text" id="language" name="language">

            <input type="submit" class="btn btn-success ques_submit" value="Submit">

        </div>








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


                $('#first_dropdown').select2({
                    theme: "classic",
                    width: 'resolve',
                    allowClear: true,
                    templateResult: showImage,


                    ajax: {
                        url: '<?php echo base_url('form_controller/getSubjects'); ?>',
                        method: 'POST',
                        dataType: 'json',
                        data: function (params) {
                            return {
                                search: params.term // Send the user's input as 'search' parameter
                            };
                        },
                        processResults: function (data) {
                            if (data && data.length > 0) {
                                return {
                                    results: data.map(function (subject) {
                                        return {
                                            id: subject.id,
                                            text: subject.name,
                                            image: subject.image
                                        };
                                    })
                                };
                            } else {
                                return {
                                    results: []
                                };
                            }
                        },
                        cache: true
                    }
                });
                function showImage(option) {
                    if (!option.id) {
                        return option.text;
                    }

                    // Use option.image to extract the image URL
                    var imageUrl = option.image;

                    var $option = $(
                        `<span><img src="${imageUrl}" class="img-icon" />${option.id}. ${option.text}</span>`
                    );

                    return $option;
                }






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
                    $('#second_dropdown').select2({

                    });
                });
                $('#first_dropdown').select2({
                    theme: "classic",
                    width: 'resolve',
                    allowClear: true,
                    templateResult: showImage,


                    ajax: {
                        url: '<?php echo base_url('form_controller/getSubjects'); ?>',
                        method: 'POST',
                        dataType: 'json',
                        data: function (params) {
                            return {
                                search: params.term // Send the user's input as 'search' parameter
                            };
                        },
                        processResults: function (data) {
                            if (data && data.length > 0) {
                                return {
                                    results: data.map(function (subject) {
                                        return {
                                            id: subject.id,
                                            text: subject.name,
                                            image: subject.image
                                        };
                                    })
                                };
                            } else {
                                return {
                                    results: []
                                };
                            }
                        },
                        cache: true
                    }
                });
                function showImage(option) {
                    if (!option.id) {
                        return option.text;
                    }

                    // Use option.image to extract the image URL
                    var imageUrl = option.image;

                    var $option = $(
                        `<span><img src="${imageUrl}" class="img-icon" />${option.id}. ${option.text}</span>`
                    );

                    return $option;
                }






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
                    $('#second_dropdown').select2({

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
                                if (data.length == 0) {
                                    data: [];
                                }
                                var table = $('#user_data').DataTable({

                                    "paging": true,
                                    "lengthMenu": [[1, 2, 3, 4, 25, 50, -1], [1, 2, 3, 4, 25, 50, 'All']],
                                    "bDestroy": true,
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
                                        { data: 'answer', title: 'Answer' },
                                        {
                                            title: "Delete",
                                            "data": null,
                                            "render": function (data, type, row) {
                                                return '<button class="btn btn-danger delete-btn" onclick="deleterec(' + data.id + ')" data-id="' + data.id + '">Delete</button>';
                                            }
                                        },
                                    ],
                                    order: [0] //sort first column (question)
                                });



                            },
                            error: function () {
                                alert("An error occurred while fetching topics.");
                            }
                        });
                    })
                });

                



                $(document).ready(function () {

                    $("#addquest").prop("disabled", true);
                    // Show the overlay and pop-up form when the "Add Question" button is clicked
                    $("#addquest").on("click", function () {
                        $("#overlay").show();
                        $("#popup-form").show();
                    });

                    // Close the overlay and pop-up form when the "Close" button is clicked
                    $("#close-popup").on("click", function () {
                        $("#overlay").hide();
                        $("#popup-form").hide();
                    });
                    $("#language").change(function () {
                        var selectedLanguage = $("#language").val();
                        if (selectedLanguage) {
                            $("#addquest").prop("disabled", false);
                        } else {
                            $("#addquest").prop("disabled", true);
                        }
                    });

                    //get form data
                    $(".ques_submit").click(function () {
                        var questionData = {
                            subject: $('#first_dropdown').val(),
                            topic: $('#second_dropdown').val(),
                            language: $('#language').val(),
                            question: $('#question').val(),
                            option1: $('#option_1').val(),
                            option2: $('#option_2').val(),
                            option3: $('#option_3').val(),
                            option4: $('#option_4').val(),
                            answer: $('#answer').val()
                        };
                        $.ajax({
                            url: '<?php echo base_url('form_Controller/ajax_addQuestion'); ?>',
                            method: 'POST',
                            dataType: 'JSON',
                            data: questionData,
                            success: function (response) {
                                if (response.status == true) {
                                    alert("Question added successfully!");
                                }
                                else {
                                    alert('error');
                                }
                            }

                        });
                    });

                })
         
            });
            function deleterec(id) {
            $.ajax({
                url: '<?php echo base_url('form_controller/deleteQuestion'); ?>',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        alert('deleted succesfully');
                        var table = $('#user_data').DataTable();
                        table.ajax.reload();
                    } else {
                        alert('not deleted');
                    }
                },
                error: function() {
                    // Handle AJAX error here
                    alert("An error occurred.");
                }
            });
        }

        </script>




    </body>
</main>




<?php include('application\views\template\footer.php') ?>