//ajax csrf-token
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

//tooltip
$(document).tooltip({
    selector: "[data-toggle=tooltip]"
})

//Reset Form
$('.modal').on('hidden.bs.modal', function () {
     $('.form')[0].reset();//clear form
})