<!DOCTYPE html>>
<html lang="en">
<head>
    <title>Pet Care</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>             
</head>
<body>
    <div class="wrapper">
        <header>
            <nav>
                <h2>PETSHELTER</h2>
                <ul class="navlinks">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Events</a></li>
                    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fas fa-plus-circle"> Add pet to shelter</i></button>
                </ul>
            </nav>
        </header>
        <div class="shop">
            <img src="../../assets/images/1.png">
            <h1>Let's <span class="adopt">Adopt</span><br>Don't <span class="shop_span">Shop</span></h1>
            <!--
            -->
            <p>Lorem ipsum dolor sit amet, consectetur<br>adipiscing elit. Neque id lorem nisi.</p>
        </div>
        <h3>These pets are looking for a good home</h3>
    </div>
    <div class="container box">
        <div class="table-responsive">
            <table id="user_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Name</th>
                        <th width="10%">Type</th>
                        <th width="10%">Details</th>
                        <th width="10%">Edit</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>
<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <label>Enter Name</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Enter Type</label>
                    <input type="text" name="type" id="type" class="form-control" />
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
    $("#add_button").click(function(){
        $("#user_form")[0].reset();
        $(".modal-title").text("Add pet");
        $("#action").val("Add");
    })
    let dataTable = $("#user_data").DataTable({
        "processing" :true,
        "serverSide" :true,
        "order":[],
        "ajax":{
            url: "<?= base_url() . 'index1/fetch_user'; ?>",
            type: "POST"
        },
        "columnDefs":[
            {
                "targets":[-1,0],
                "orderable" :false,
            },
        ],
    });
    $(document)
        .on("submit", "#user_form", function(event){
            event.preventDefault();
            let name = $("#name").val();
            let type = $("#type").val();
        if(name != "" && type != ""){
            $.ajax({
                url: "<?= base_url() . 'index1/user_action'?>",
                method: 'POST',
                data: new FormData(this),
                contentType :false,
                processData :false,
                success :function(data){
                    alert(data);
                    $("#user_form")[0].reset();
                    $("#userModal").modal('hide');
                    dataTable.ajax.reload();
                }
            });
        }else{
            alert("Both fields are required!");
        }
    });
    $(document)
        .on("click", "edit", function(){
            let user_id = $(this).attr("id");
            $.ajax({
                url: "<?= base_url(); ?> index1/fetch_single_user",
                method: "POST",
                data: {user_id:user_id},
                dataType: "json",
                success: function(data){
                    $("#userModal").modal("show");
                    $("#name").val(data.name);
                    $("type").val(data.type);
                    $(".modal-title").text("Edit");
                    $("#user_id").val(user_id);
                    $("#action").val("Edit");
                }
            })
        });
    });
</script>