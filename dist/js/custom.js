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