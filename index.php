<?php //include('logic.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRUD</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-success text-center text-uppercase">CRUD operation using AJAX</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">ADD</button>
        </div>
        <h2 class="text-primary">DATA</h2>
        <div id="data_content">
        </div>

        <div class="modal" id="myModal">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">CRUD operation using AJAX</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input id="name" type="text" name="" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input id="email" type="email" name="" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone: </label>
                            <input id="phone" type="text" name="" class="form-control" placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input id="address" type="text" name="" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="saveInfo()" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal" id="updateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal head</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_name">Name: </label>
                            <input id="update_name" type="text" name="" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="update_email">Email: </label>
                            <input id="update_email" type="email" name="" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="update_phone">Phone: </label>
                            <input id="update_phone" type="text" name="" class="form-control" placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label for="update_address">Address: </label>
                            <input id="update_address" type="text" name="" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="updateUser()" data-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="hidden" id="hidden_user_id">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="ajax_jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>