
$(document).ready(function () {
    dataView();
});

function dataView() {
    var x = "x";
    $.ajax({
        url: 'logic.php',
        type: 'post',
        data:{
            x:x
        },
        success:function (data,status) {
            $('#data_content').html(data);
        }
    });
}

function saveInfo(){
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    $.ajax({
        url: 'logic.php',
        type: 'post',
        data:{
            name:name,
            email:email,
            phone:phone,
            address:address
        },
        success:function (data,status) {
            dataView();
        }
    });
}

function DeleteInfo(user_id) {
    var conf = confirm("Your Data will be deleted !");
    if (conf === true){
        $.ajax({
            url:"logic.php",
            type:"post",
            data:{
                user_id:user_id
            },
            success:function (data,status) {
                dataView();
            }
        });
    }
}

function userInfo(user_id) {
    $('#hidden_user_id').val(user_id);
    $.ajax({
        url:'logic.php',
        type: 'post',
        data : {
        hidden_user_id:user_id
        },
        success:function (data, status) {
            var user = JSON.parse(data);
            $('#update_name').val(user.name);
            $('#update_email').val(user.email);
            $('#update_phone').val(user.phone);
            $('#update_address').val(user.addresses);
        }
    });
    $('#updateModal').modal('show');
}

function updateUser() {
    var updated_name = $('#update_name').val();
    var updated_email = $('#update_email').val();
    var updated_phone = $('#update_phone').val();
    var updated_address = $('#update_address').val();
    var updated_user_id = $('#hidden_user_id').val();
    $.post(
       'logic.php',
        {
        updated_user_id:updated_user_id,
        updated_name:updated_name,
        updated_email:updated_email,
        updated_phone:updated_phone,
        updated_address:updated_address
        },
        function (data,status){
            $('#updateModal').modal('hide');
           dataView();
        }
    );
}