$(document).ready(function() {
    $('#example').DataTable();
});
$(document).ready(function() {
    $("#hide").click(function() {

        $("#hide").hide();
        $("#show").show();
        confirm("after downloading please refresh the page/ nu mara ku downloading urefreshing page");
    });



});
$(document).ready(function() {
    var table = $('#datatableb').DataTable({
        lengthChange: false,

        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');
});