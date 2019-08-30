function approve(_id) {
    $("#overlay").show();
    $.ajax({
        url: "../controllers/sub-school-request.php",
        type: "POST",
        data: {id: _id, action:"approve"}
    }).done(()=>{
        window.location.reload();
    });
}

function reject(_id) {
    $("#overlay").show();
    $.ajax({
        url: "../controllers/sub-school-request.php",
        type: "POST",
        data: {id: _id, action:"reject"}
    }).done((_res)=>{
        window.location.reload();
    });
}

$("#new_category").hide();
$("#close_btn").hide();
function add() {
    $("#new_category").show();
    $("#close_btn").show();  
    $("#add_btn").hide(); 
    $("#category_list_tabel").hide(); 
}
function cancel() {
    $("#new_category").hide();
    $("#close_btn").hide();  
    $("#add_btn").show();  
    $("#category_list_tabel").show(); 
}

window.temp = "zero";
function showChild(_id){
   if (window.temp != "zero") {
       $("."+window.temp).hide(); 
   }
   $("."+_id).show();
   window.temp = _id;
   
}