<!-- Show session messages -->
<script>
    $(document).ready(function() {
        if(sessionStorage.getItem('successMessage') && sessionStorage.getItem('successMessage') != '') {
            toastr.success(sessionStorage.getItem('successMessage'));
            sessionStorage.setItem('successMessage', '');
        }
        if(sessionStorage.getItem('warningMessage') && sessionStorage.getItem('warningMessage') != '') {
            toastr.warning(sessionStorage.getItem('warningMessage'));
            sessionStorage.setItem('warningMessage', '');
        }
    });
</script>
<!-- end show session messages -->

<!-- Change status of the user -->
<script>
    $(document).on('change', '.user_status', function() {
        var status_value = $('.user_status').val();
        var slug = $(this).data('slug');
        var status_list= "{{ Request::get('status') }}"
        $.ajax({
            url: "{{ route('users.update-status') }}",
            type: "POST",
            datatype: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "slug": slug,
            },
            success: function(response) {
                if(response.status == 'success') {
                    if(response.message_type == 'success') {
                        toastr.success(response.message);
                        if(status_list == 'inactive') {
                            sessionStorage.setItem('successMessage', response.message);
                            location.reload();
                        }
                    } else if(response.message_type == 'warning') {
                        toastr.warning(response.message);
                        if(status_list == 'active') {
                            sessionStorage.setItem('warningMessage', response.message);
                            location.reload();
                        }
                    }
                }
            },
            error: function(error) {
                console.log(error);
                toastr.error('Something went wrong, please check error logs');
            }
        })

    })
</script>
<!-- end change status of user -->

<!-- Delete user -->
<script>
    $(document).on('click', '.delete_user', function() {
        var slug = $(this).data('slug');
        $.ajax({
            url: "{{ route('users.delete') }}",
            type: "DELETE",
            datatype: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "slug": slug
            },
            success: function(response) {
                if(response.status == 'success') {
                    sessionStorage.setItem('successMessage', response.message);
                    location.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(error) {
                console.log(error);
                toastr.error('Something went wrong, please check error logs');
            }
        })
    })
</script>
<!-- end delete user -->

<!-- Restore user -->
<script>
    $(document).on('click', '.restore_user', function() {
        var slug = $(this).data('slug');
        $.ajax({
            url: "{{ route('users.restore') }}",
            type: "POST",
            datatype: "JSON",
            data: {
                "_token": "{{ csrf_token() }}",
                "slug": slug
            },
            success: function(response) {
                if(response.status == 'success') {
                    sessionStorage.setItem('successMessage', response.message);
                    location.reload();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(error) {
                console.log(error);
                toastr.error('Something went wrong, please check error logs');
            }
        })
    })
</script>
