$(document).ready(function(){
    $('#users_table').DataTable();

    window.addUserModal = new bootstrap.Modal(document.getElementById('add_user_modal'), {});
    window.editUserModal = new bootstrap.Modal(document.getElementById('edit_user_modal'), {});


    $('#add_user_button').click(function(e){
        e.preventDefault();
        window.addUserModal.show();
    });

    $("[name='employee_id']").keypress(function(e){
        if(e.keyCode != 8){
            this.value = this.value.toLocaleUpperCase();
            var text = this.value;
            if(text.length == 2){
                this.value = text + '-'; 
            }
        }
    }); 

    $('body').on('click', '.edit_employee', function(e){
        e.preventDefault();


        $('#edit-user-form').find('[name="id"]').val($(this).data('id'));
        $('#edit-user-form').find('[name="name"]').val($(this).data('name'));
        $('#edit-user-form').find('[name="email"]').val($(this).data('email'));
        $('#edit-user-form').find('[name="employee_id"]').val($(this).data('employeeid'));
        window.editUserModal.show();
    });
    
    $('body').on('click', '.delete_employee', function(e){
        e.preventDefault();

        var data = {};
        data['id'] = $(this).data('id');

        var request = $.ajax({
            url: "/delete-employee",
            method: "POST",
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);
        });
        request.done(function(result) {
            window.addUserModal.hide();
            if(result['result']){
                Swal.fire({
                    title: 'Success!',
                    text: 'User deleted successfully!',
                    icon: 'success',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error with deleting the user. Please contact administration!',
                    icon: 'error',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            }
        });
    });
     
     
    $('#add-user-form').on("submit", function(e){
        e.preventDefault();
        var data = {};
        
        data['name'] = $(this).find('[name="name"]').val();
        data['email'] = $(this).find('[name="email"]').val();
        data['employee_id'] = $(this).find('[name="employee_id"]').val();

        
        var request = $.ajax({
            url: "/add-employee",
            method: "POST",
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);
        });
        request.done(function(result) {
            window.addUserModal.hide();
            if(result['result']){
                Swal.fire({
                    title: 'Success!',
                    text: 'User added successfully!',
                    icon: 'success',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error with adding the user. Please contact administration!',
                    icon: 'error',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            }
        });

    });

    $('#edit-user-form').on("submit", function(e){
        e.preventDefault();
        var data = {};

        data['id'] = $(this).find('[name="id"]').val();    
        data['name'] = $(this).find('[name="name"]').val();
        data['email'] = $(this).find('[name="email"]').val();
        data['employee_id'] = $(this).find('[name="employee_id"]').val();

        var request = $.ajax({
            url: "/edit-employee",
            method: "POST",
            data: data,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            console.log("Request failed: " + textStatus);
        });
        request.done(function(result) {
            window.editUserModal.hide();
            if(result['result']){
                Swal.fire({
                    title: 'Success!',
                    text: 'User updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            
            }else{
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error with updating the user. Please contact administration!',
                    icon: 'error',
                    confirmButtonText: 'continue'
                }).then((value) => {
                    window.location.reload();
                });
            }
        });

    });
    

});