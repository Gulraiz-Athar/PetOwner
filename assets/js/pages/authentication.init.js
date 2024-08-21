$( document ).ready(function() {

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
          passwordField.type = "text";
        } else {
          passwordField.type = "password";
        }
      }

    $(".generate_label").click(function() {
        var invoice_id = $(this).attr('invoice_id');
        $.ajax({
          url: "assets/php/generate_label.php",
          method: 'post',
          data: {
            'invoice_id': invoice_id,
          },
          success: function(data) {
            //   console.log(data);
            Swal.fire({
              icon: "success",
              title: "Congratulation",
              text: "Label Generated Successfully!",
            }).then((result) => {
              // window.location.href="pet_owner_invoices.php?id="+petowner;
              location.reload();
            });
          }
        });
      });

    $(".send_invoice").click(function() {
        var invoice_id = $(this).attr('invoice_id');
        $.ajax({
          url: "assets/php/vet_sending_mail.php",
          method: 'post',
          data: {
            "invoice_id": invoice_id,
          },
          success: function(petowner) {
            Swal.fire({
              icon: "success",
              title: "Congratulation",
              text: "Invoice Sent Successfully!",
            }).then((result) => {
              // window.location.href="pet_owner_invoices.php?id="+petowner;
              location.reload();
            });
          }
        });
      });

    $("#role").change(function() {
        var role = $(this).val();
        if (role == "veterinarian") {
          $(".veterian").show();
          $(".pet_owner").hide();
        } else {
          $(".veterian").hide();
          $(".pet_owner").show();
        }
    });

    $("#user_role").change(function() {
        var role = $(this).val();
        if (role == "veterinarian") {
          $(".veterian").show();
          $(".pet_owner").hide();
        } else {
          $(".veterian").hide();
          $(".pet_owner").show();
        }
      });

    $("#petowner_id").change(function() {
        var value = $(this).val();
        if (value) {
          $.ajax({
            url: "assets/php/services.php",
            method: 'post',
            data: {
              'flag': 'petowner_data',
              'id': value,
            },
            success: function(data) {
              var json = $.parseJSON(data);
              var petowner_add = json.address;
              $("#pet_owner_address").val(petowner_add);
            }
          });
        } else {
          $("#pet_owner_address").val('');
        }
      });
      $(".create_invoice").click(function() {
        $.ajax({
          url: "assets/php/create_invoice.php",
          method: 'post',
          data: $('#create_invoice').serialize(),
          success: function(petowner) {
            Swal.fire({
              icon: "success",
              title: "Congratulation",
              text: "Invoice Created Successfully!",
            }).then((result) => {
              window.location.href = "invoice_detail.php?id=" + petowner;
            });
          }
        });
      });


$(".login_user").on("click", function (event) {
    event.preventDefault();
    var data = $('#login_user').serialize();

    $.ajax({
        method: "POST",
        url: "assets/php/login_user.php",
        data: data
    }).done(function (d) {
        if (d == "verified") {
            Swal.fire({
                title: "Good job!",
                text: "You are Successfully login",
                icon: "success"
            }).then(function () {
                window.location.assign("index.php")
            });
        } else if (d == "not verified") {
            Swal.fire({
                title: "Username And Password Is Incorrect or Require Admin Approval",
                // text: "",
                icon: "error"
            });
        }
    });
});

$(".reset_pass").on("click", function(event){

    event.preventDefault(); 
    var email = $("#forget_email").val();

    if(email){

        $.ajax({
            method: "POST",
            url: "assets/php/forget_password_mail.php",
            data: {"email" : email,},
        })
        .done(function(data) {
            
            Swal.fire({
                title: "Good job!",
                text: "Email Sent Successfully",
                icon: "success"
            }).then(function() {
                window.location.assign("auth-login.php") 
            });
        });

    }else{

        Swal.fire({
            title: "Good job!",
            text: "Please Enter Correct Email",
            icon: "error",
        }).then(function() {
           location.reload();
        });

    }
});


$(".update_pass").on("click", function(event){

    event.preventDefault(); 
    var new_password = $("#new_password").val();
    var c_new_password = $("#confirm_new_password").val();
    var token = $("#token").val();

    if(new_password == c_new_password){

        $.ajax({
            method: "POST",
            url: "assets/php/update_password.php",
            data: {"new_password" : new_password, "token" : token,},
        })
        .done(function(data) {
            
            Swal.fire({
                title: "Good job!",
                text: "Password Updated Successfully",
                icon: "success"
            }).then(function() {
                window.location.assign("auth-login.php") 
            });
        });

    }else{

        alert("not equal");

        Swal.fire({
            title: "Good job!",
            text: "Please Enter Correct Password",
            icon: "error",
        }).then(function() {
           location.reload();
        });

    }
});



$(".submit_register").on("click", function(event){
    event.preventDefault(); 
var data = $("#auth_register_page").serialize();
$.ajax({
    method: "POST",
    url: "assets/php/auth_register.php",
    data: data
})
.done(function(data) {
    
    Swal.fire({
        title: "Good job!",
        text: "New User is Added",
        icon: "success"
    }).then(function() {
        window.location.assign("auth-login.php") 
    });
});
});

$(".submit_register_user_from_admin").on("click", function(event){
    event.preventDefault(); 
var data = $("#auth_register_page").serialize();
$.ajax({
    method: "POST",
    url: "assets/php/auth_register.php",
    data: data
})
.done(function(data) {
    
    Swal.fire({
        title: "Good job!",
        text: "New User is Added",
        icon: "success"
    }).then(function() {
        window.location.assign("users.php") 
    });
});
});


$(".delete-btn-user").on("click", function() {
    var Id = $(this).attr("data_id");
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                method: "POST",
                url: "assets/php/delete_user.php",
                data: {id : Id},
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    ).then(function() {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Error!',
                        'An error occurred while deleting.',
                        'error'
                    );
                }
            }).then(function() {
                location.reload();
            });
        }
    });
});

$(".update_register").on("click", function(event){
event.preventDefault(); 
var data = $(this).closest('form').serialize();
$.ajax({
    method: "POST",
    url: "assets/php/auth_update_user.php",
    data: data
})
.done(function(d) {
    
    // alert(d);
    Swal.fire({
        title: "Good job!",
        text: "User is Updated",
        icon: "success"
    }).then(function() {
        location.reload();
    });
});
});

$(".submit_register_admin").on("click", function(event){
    event.preventDefault(); 
var data = $("#auth_register_page_admin").serialize();
$.ajax({
    method: "POST",
    url: "assets/php/auth_register_admin.php",
    data: data
})
.done(function() {
    Swal.fire({
        title: "Good job!",
        text: "New User is Created",
        icon: "success"
    }).then(function() {
        location.reload();
    });
});
});

$(".submit_invoice").on("click", function(event){
    event.preventDefault(); 
    var data = $(this).closest('form').serialize();
    $.ajax({
        method: "POST",
        url: "assets/php/submit_invoice.php",
        data: data
    })
    .done(function(d) {
        
        console.log(d);
        // Swal.fire({
        //     title: "Good job!",
        //     text: "User is Updated",
        //     icon: "success"
        // }).then(function() {
        //     location.reload();
        // });
    });
});


    $(".delete-btn-invoice").on("click", function() {
        var Id = $(this).attr("data_id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
    
                $.ajax({
                    method: "POST",
                    url: "assets/php/delete_invoice.php",
                    data: {id : Id},
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Invoice has been deleted.',
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting.',
                            'error'
                        );
                    }
                }).then(function() {
                    location.reload();
                });
            }
        });
    });
    
    $(".update_invoice").on("click", function(event){
        event.preventDefault(); 
        var data = $(this).closest('form').serialize();
        $.ajax({
            method: "POST",
            url: "assets/php/update_invoice.php",
            data: data
        })
        .done(function(d) {
            Swal.fire({
                title: "Good job!",
                text: "Invoice is Updated",
                icon: "success"
            }).then(function() {
                location.reload();
            });
        });
        });
        
        $(".new_delivery").on("click", function(event){
            event.preventDefault(); 
            var data = $(this).closest('form').serialize();

            $.ajax({
                method: "POST",
                url: "assets/php/new_delivery.php",
                data: data
            })
            .done(function(d) {
                Swal.fire({
                    title: "Good job!",
                    text: "Delivery Updated",
                    icon: "success"
                }).then(function() {
                    location.reload();
                });
            });
            });
            $(".update_delivery").on("click", function(event){
                event.preventDefault(); 
                var data = $(this).closest('form').serialize();
                $.ajax({
                    method: "POST",
                    url: "assets/php/update_delivery.php",
                    data: data
                })
                .done(function(d) {
                    Swal.fire({
                        title: "Good job!",
                        text: "Invoice is Updated",
                        icon: "success"
                    }).then(function() {
                        location.reload();
                    });
                });
                });

                $(".delete-delivery").on("click", function() {
                    var Id = $(this).attr("data_id");
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                
                            $.ajax({
                                method: "POST",
                                url: "assets/php/delete_delivery.php",
                                data: {id : Id},
                                success: function(response) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Delivery has been deleted.',
                                        'success'
                                    ).then(function() {
                                        location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred while deleting.',
                                        'error'
                                    );
                                }
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                });
    
});