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
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  
</head>
<body>
    <h1>Welcome to Admin Page</h1>
    <div class="container box">  
           
           <div class="table-responsive">  
                <br />  
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr>  
                               <th width="10%">Id</th>  
                               <th width="35%">Name</th>  
                               <th width="35%">Email</th>  
                               <th width="10%">Edit</th>  
                               <th width="10%">Delete</th>  
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div> 
     
    
    <!-- Add a logout button with a link to the logout URL -->
    <a href="<?php echo base_url('form_controller/logout'); ?>">Logout</a>
    <script>
        $(document).ready(functon(){
            var dataTable=$('#user_data').Datatable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url:"<?php echo base_url().'form_controller/fetch_user'; ?>",
                    type:"POST"
        
                }
            })
        });
    </script>
</body>
</html>
