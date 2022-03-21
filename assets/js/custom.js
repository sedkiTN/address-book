$(document).ready(function() {
    //reset btn
    $('.btn-danger').click(function(){
        $('#res').text('');
        $('#resRegister').text('');
    });
    //submit login form
    $('#loginForm').submit(function(){
        var formData = new FormData();
        formData.append('username', $(this)[0].username.value);
        formData.append('password', $(this)[0].password.value);
        
        $.ajax({
            url: 'login/',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data){
                $('#res').html(data);
                if($('#res').text()=="Login Successful. Redirecting..."){
                    window.location.href = 'dashboard/';
                }
            },
            error: function(e){
                console.log(e);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        $(this)[0].reset();
        return false;
    });  	
    //submit registration form
    $('#registerForm').submit(function(){
        var formData = new FormData();
        formData.append('fn', $(this)[0].fn.value);
        formData.append('ln', $(this)[0].ln.value);
        formData.append('username', $(this)[0].username.value);
        formData.append('password', $(this)[0].password.value);

        $.ajax({
            url: 'register/',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                $('#resRegister').html(data);
            },
            error: function(e){
                console.log(e);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        $(this)[0].reset();
        return false;
    });  	
});