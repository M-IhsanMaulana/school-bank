"use strict";

$("#swal-1").click(function () {
    swal("Hello");
});

$("#swal-2").click(function () {
    swal("Good Job", "You clicked the button!", "success");
});

$("#swal-3").click(function () {
    swal("Good Job", "You clicked the button!", "warning");
});

$("#swal-4").click(function () {
    swal("Good Job", "You clicked the button!", "info");
});

$("#swal-5").click(function () {
    swal("Good Job", "You clicked the button!", "error");
});

$("#swal-6").click(function () {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
    });
});

$("#swal-7").click(function () {
    swal({
        title: "What is your name?",
        content: {
            element: "input",
            attributes: {
                placeholder: "Type your name",
                type: "text",
            },
        },
    }).then((data) => {
        swal("Hello, " + data + "!");
    });
});

$("#swal-8").click(function () {
    swal("This modal will disappear soon!", {
        buttons: false,
        timer: 3000,
    });
});

$("#show-confirmation").click(function (event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    const swalWithBootstrapButtons = swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger m-2",
        },
        buttonsStyling: false,
    });

    swalWithBootstrapButtons
        .fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true,
        })
        .then((result) => {
            if (result.isConfirmed) {
                form.submit();
                swalWithBootstrapButtons.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    "Cancelled",
                    "Your imaginary file is safe :)",
                    "error"
                );
            }
        });
});
