/*
Template Name: Arconsult  - Admin & Dashboard Template
Author: Arconsult 
Website: https://Arconsult .com/
Contact: Arconsult @gmail.com
File: two step verification Init Js File
*/

// move next
$('input[id^=digit]').on('keyup',function(e) {
    var id = $(this).attr("id")
    var count = id.replace("digit", '');
    count++;
    $("#digit" + count).focus();
});