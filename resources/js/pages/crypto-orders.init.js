/*
Template Name: Arconsult  - Admin & Dashboard Template
Author: Arconsult 
Website: https://Arconsult .com/
Contact: Arconsult @gmail.com
File: Crypto orders select2 Js File
*/

// Select2
$(".select2-search-disable").select2({
    minimumResultsForSearch: Infinity
});

// datatable
$(document).ready(function() {
    $('.datatable').DataTable();

    $(".dataTables_length select").addClass('form-select form-select-sm');
});