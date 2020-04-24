<?php
//include('functions.php');

$con = mysqli_connect("localhost","root","","crud");
extract($_POST);

//  show table
if (isset($_POST['x'])){
    $data = '<table class="table table-bordered table-striped">
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';
    $sql = "SELECT * from info";
    $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0){
        $i = 1;
        while ($dataObject = $result->fetch_object()){
            $data .= '<tr>
                        <td>'.$i.'</td>
                        <td>'.$dataObject->name.'</td>
                        <td>'.$dataObject->email.'</td>
                        <td>'.$dataObject->phone.'</td>
                        <td>'.$dataObject->addresses.'</td>
                        <td>
                            <button type="button" onclick="userInfo('.$dataObject->id.')" class="btn btn-success">Edit</button>
                        </td>
                        <td>
                            <button type="button" onclick="DeleteInfo('.$dataObject->id.')" class="btn btn-warning">Delete</button>
                        </td>
                      </tr>';
            $i++;
        }
    }
    $data .= '</table>';
    echo $data;
}

//  insert
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset( $_POST['address'])){
//        $name = $_POST['name'];
//        $email = $_POST['email'];
//        $phone = $_POST['phone'];
//        $address = $_POST['address']; this are no longer need as we use extract($_post) method

        $sql = "INSERT INTO `info`(`id`, `name`, `email`, `phone`, `addresses`) VALUES ('','$name','$email','$phone','$address')";
        mysqli_query($con,$sql);
    }

//  delete
if (isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];

    $sql = "DELETE from info where id = '$user_id'";
    mysqli_query($con,$sql);
}

//  view from db
if (isset($_POST['hidden_user_id']) && isset($_POST['hidden_user_id']) !== ""){
    $user_id = $_POST['hidden_user_id'];
    $sql = "SELECT * from info where id ='$user_id'";

    if (!$result = mysqli_query($con,$sql)){
        exit(mysqli_error());
    }
    $response = array();
    if (mysqli_num_rows($result) > 0){
        while ($resource = mysqli_fetch_assoc($result)){
            $response = $resource;
        }
    }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found";
    }
    echo json_encode($response);
}
else{
    $response['status'] = 200;
    $response['message'] = "Invalid";
}

// update
if(isset($_POST['updated_user_id'])){
    $user_id = $_POST['updated_user_id'];
    $name = $_POST['updated_name'];
    $email = $_POST['updated_email'];
    $phone = $_POST['updated_phone'];
    $address = $_POST['updated_address'];

    $sql = "UPDATE info SET name = '$name', email = '$email', phone = '$email', addresses = '$address' WHERE id = '$user_id'";
    if (!$result = mysqli_query($con,$sql)){
        exit(mysqli_error());
    }
}

?>
