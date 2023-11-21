$(document).ready(function() {
	load_package();
	load_admin();
    load_feedback();

	

	$(document).on('click', '#del-pack', function(event) {
		event.preventDefault();
		var id = $(this).data('id');

		PackageDelete(id);
	});

    $(document).on('click', '#del-status', function(event) {
        event.preventDefault();
        var id = $(this).data('id');

        statusDelete(id);
    });

	$(document).on('click', '#admin-del', function(event) {
		event.preventDefault();
		/* Act on the event */
		var id = $(this).data('id');
		AdminDelete(id);
	});

  $(document).on('click', '#del-feed', function(event) {
    event.preventDefault();
    /* Act on the event */

    var id = $(this).data('id');
    feedDelete(id);
  });


  $(document).on('click', '#more', function(event) {
    event.preventDefault();
    /* Act on the event */

    var id = $(this).data('id');

    $.post('feed-details.php', {feed_id: id}, function(data) {
      if (data != "") {
        $('#load_feedback').hide();
        $('#load_more').html(data);
      }
    });
  });


  $(document).on('click', '#go-back', function(e) {
    $('#load_more').empty();
    $('#load_feedback').show();
 }); 
	



function PackageDelete(id) {
  swal({

    title: 'Are you sure?',
    text: 'it will be deleted permanently!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    ConfirmButtonText: 'Yes, delete it!',
    showLoaderOnConfirm: true,

    preConfirm: function () {
        return new Promise(function (resolve) {
           $.ajax({
               url: 'delete.php',
               type: 'POST',
               data: 'deletePackage=' + id,
               dataType: 'json'
           })
           .done(function(response) {
               swal('Deleted', response.message, response.status);
               load_package();
           })
           .fail(function() {
               swal('Oops', 'Something went wrong !', 'error');
           });
           
        });
    },

    allowOutsideClick: false

  });
}


function load_package() {
	$('#load_package').load('load_package.php');
}

    function statusDelete(id) {
        swal({

            title: 'Are you sure?',
            text: 'it will be deleted permanently!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            ConfirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        url: 'delete-status.php',
                        type: 'POST',
                        data: 'delete=' + id,
                        dataType: 'json'
                    })
                        .done(function (response) {
                            swal('Deleted', response.message, response.status);
                            if (response.message === "Status Deleted Successfully..."){
                                $('.status_'+id).parent().fadeOut();
                            }
                        })
                        .fail(function () {
                            swal('Oops', 'Something went wrong !', 'error');
                        });

                });
            },

            allowOutsideClick: false

        });
    }



function AdminDelete(id) {
  swal({

    title: 'Are you sure?',
    text: 'it will be deleted permanently!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    ConfirmButtonText: 'Yes, delete it!',
    showLoaderOnConfirm: true,

    preConfirm: function () {
        return new Promise(function (resolve) {
           $.ajax({
               url: 'delete-admin.php',
               type: 'POST',
               data: 'delete=' + id,
               dataType: 'json'
           })
           .done(function(response) {
               swal('Deleted', response.message, response.status);
               load_admin();
           })
           .fail(function() {
               swal('Oops', 'Something went wrong !', 'error');
           });
           
        });
    },

    allowOutsideClick: false

  });
}


function load_admin() {
	$('#load_admin').load('load_admin.php');
}


function feedDelete(id) {
  swal({

    title: 'Are you sure?',
    text: 'it will be deleted permanently!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    ConfirmButtonText: 'Yes, delete it!',
    showLoaderOnConfirm: true,

    preConfirm: function () {
        return new Promise(function (resolve) {
           $.ajax({
               url: 'delete-feedback.php',
               type: 'POST',
               data: 'delete=' + id,
               dataType: 'json'
           })
           .done(function(response) {
               swal('Deleted', response.message, response.status);
               load_feedback();
           })
           .fail(function() {
               swal('Oops', 'Something went wrong !', 'error');
           });
           
        });
    },

    allowOutsideClick: false

  });
}

function load_feedback() {
  $('#load_feedback').load('load_feedback.php');
}


});