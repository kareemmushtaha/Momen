function select_all() {
$('input[class=selected_data]:checkbox').each(function(){
if($('input[class=select-all]:checkbox:checked').length == 0){
    $(this).prop("checked", false);
} else {
    $(this).prop("checked", true);
}
});
}


$(document).on("click", ".deleteBtn", function() {
    $("#multi_delete").modal("show");
    var number_checkbox = $(".selected_data").filter(":checked").length;
    $(".count").html(number_checkbox);
    if(number_checkbox > 0){
        $(".delete_done").show();
        $(".check_delete").hide();
    }else{
        $(".delete_done").hide();
        $(".check_delete").show();
    }
});

$(document).on("click", ".sendNotification", function() {
    $("#sendNotification").modal("show");
    var number_checkbox = $(".selected_data").filter(":checked").length;
    $(".count").html(number_checkbox);
    if(number_checkbox > 0){
        $(".delete_done").show();
        $(".check_delete").hide();
    }else{
        $(".delete_done").hide();
        $(".check_delete").show();
    }
});
// Multiple active
$(document).on("click", ".activeMultiBtn", function() {
    $("#multi_active").modal("show");
    var number_checkbox = $(".selected_data").filter(":checked").length;
    $(".count").html(number_checkbox);
    if(number_checkbox > 0){
        $(".active_done").show();
        $(".check_active").hide();
    }else{
        $(".active_done").hide();
        $(".check_active").show();
    }
});

// Multiple add points
$(document).on("click", ".multi_addpoints", function() {
    $("#multi_addpoints").modal("show");
    var number_checkbox = $(".selected_data").filter(":checked").length;
    $(".count").html(number_checkbox);
    if(number_checkbox > 0){
        $(".add-points-input").show();
        $(".done").show();
        $(".check").hide();
    }else{
        $(".done").hide();
        $(".add-points-input").hide();
        $(".check").show();
    }
});

$(document).on("click", "#addpointbtn", function() {
    $("#addpoints").modal("show");

    // if(number_checkbox > 0){
    //     $(".delete_done").show();
    //     $(".check_delete").hide();
    // }else{
    //     $(".delete_done").hide();
    //     $(".check_delete").show();
    // }
});
