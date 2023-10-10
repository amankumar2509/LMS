<!-- views/admin/index.php -->
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php ?>
    </title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <table class="display table table-bordered table-striped" id="all-user-grid" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>password</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="editFormContainer">
                    <!-- Edit Form Will Be Loaded Here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary save-edit">Edit</button>
                <button type="button" class="btn btn-danger delete-action">Delete</button>
            </div>
        </div>
    </div>
</div>


    </div>

    <!-- Include jQuery and DataTables JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // $(document).ready(function () {
        //     $('#data-table').DataTable({
        //         "ajax": {
        //             "url": "<?php echo site_url('form_controller/adminpage'); ?>",
        //             "type": "POST"
        //         },
        //         "columns": [
        //             {"data": "id"},
        //             {"data": "name"},
        //             {"data": "email"},
        //             {"data": "password"}
        //         ]
        //     });
        // });
        $(document).ready(function () {
            var table = 'all-user-grid';
            var dataTable = jQuery("#" + table).DataTable({

                "lengthMenu": [
                    [1, 5, 10, 30],
                    [1, 5, 10, 30]
                ],
                "order": [
                    [0, "ASC"]
                ],
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0, 1, 2, 3]
                },],
                "ajax": {
                    url: "<?php echo base_url('form_controller/ajax_getAdmindata'); ?>", // json datasource
                    type: "post", // method  , by default get
                    data: function (d) {
                        ;


                        $("#" + table).find(".search-input-text").each(function () {
                            if ($(this).val() != "") {
                                d['columns'][$(this).data("column")]['search']['value'] = $(this).val();
                            }
                        });
                        $("#" + table).find(".search-input-select").each(function () {
                            if ($(this).val() != "") {
                                d['columns'][$(this).data("column")]['search']['value'] = $(this).val();
                            }
                        });
                    },
                    error: function () { // error handling
                        jQuery("." + table + "-error").html("");
                        jQuery("#" + table + "_processing").css("display", "none");
                    }
                },
                "columns": [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'password' },
                    {
                        data: null,
                        render: function (data, type, full, meta) {
                            var rowId = full.id; // Assuming 'id' is the unique identifier in your data
                            return '<button class="btn btn-primary btn-sm action-button" data-toggle="modal" data-target="#actionModal" data-rowid="' + rowId + '">Action</button>';
                        }
                    }


                ]
            });


            
        });
    </script>
</body>

</html>