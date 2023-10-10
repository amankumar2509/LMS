<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Include Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h1>Welcome to Admin Page</h1>
    <div class="container box">
        <div class="table-responsive">
            <br />
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="35%">Name</th>
                        <th width="35%">Email</th>
                        <th width="15%">Edit</th>
                        <th width="15%">Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update the Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>

                <div class="modal-body">
                    <form id="save" action="">
                        <div class="container">
                            <label for="Name">Change the Name: </label>
                            <input type="text" id="name" name="name"></input>
                        </div>
                        <br>
                        <div class="container">
                            <!-- <label for="id">Change the Name: </label> -->
                            <input type="number" id="id" name="id" hidden></input>
                        </div>
                        <br>
                        <div class="container">
                            <label for="email">Change the Email: </label>
                            <input type="email" id="email" name="email"></input>
                        </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add a logout button with a link to the logout URL -->
    <div class="col-md-6" id="logout">
                    <a href="<?php echo base_url('form_controller/logout'); ?>" class=".logout-button">Logout</a>
                </div>

    <script>
        $(document).ready(function() {
            $('#exampleModal').hide();
            // Initialize DataTable
            var dataTable = $('#user_data').DataTable({
                "paging": true,
                "lengthMenu": [
                    [5, 2, 3, 4, 25, 50, 75, 100, -1],
                    [5, 2, 3, 4, 25, 50, 75, 100, 'All']
                ],
                "ajax": {
                    "url": "<?php echo base_url('form_controller/ajax_getAdmindata'); ?>",
                    "type": "POST"
                },
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button class="btn btn-info edit-btn" onclick="modalopen(' + data.id + ')" data-id="' + data.id + '">Edit</button>';
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button class="btn btn-danger delete-btn" onclick="deleterec(' + data.id + ')" data-id="' + data.id + '">Delete</button>';
                        }
                    }
                ]
            });

        });
        $(".close").click(function() {
            $('#exampleModal').hide();
        })

        function modalopen(id) {
            $('#exampleModal').show();
            $.ajax({
                url: '<?php echo base_url('form_controller/updateInfo'); ?>',
                method: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#id').val(data.id);

                },
                error: function() {
                    // Handle AJAX error here
                    alert("An error occurred while fetching topics.");
                }
            });

        }

        function deleterec(id) {
            $.ajax({
                url: '<?php echo base_url('form_controller/deleteData'); ?>',
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
        $(document).ready(function() {
            $("#save").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>form_controller/infoChange",
                    dataType: "json",
                    data: formData,
                    success: function(res) {
                        if (res == 1) {

                            $('#exampleModal').hide();
                            var table = $('#user_data').DataTable();
                            table.ajax.reload();
                            alert("Data updated Successfully");
                        } else {

                            $('#exampleModal').hide();
                            alert("Data did not update");
                        }
                    }

                });
            });
        });
    </script>
</body>

</html>