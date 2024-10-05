$(document).ready(function () {


    $('#createRecord').on('click', function () {

        $.ajax({
            url: '../controllers/recordSave.php', // <-- point to server-side PHP script
            data: {
                "author": $("#author").val(),
                "title": $("#title").val(),
                "genre": $("#genre").val(),
                "price": $("#price").val(),
                "publish_date": $("#publish_date").val(),
                "description": $("#description").val()
            },
            type: 'post',
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj.status); // <-- display response from the PHP script, if any
                if (obj.status == "201") {
                    alert("record create successfully");
                    setInterval(() => {
                        location.reload();
                    }, 300);
                }
                else {
                    alert("Somthing Went Wrong..");
                    setInterval(() => {
                        location.reload();
                    }, 400);
                }
            }
        });
    });

    // record delete

    $('#DeleteRecord').on('click', function () {

        var check = confirm("Are you sure to delete this record");
        if (check) {
            $.ajax({
                url: '../controllers/recordDelete.php', // <-- point to server-side PHP script
                data: {
                    "record_id": $(this).val()
                },
                type: 'post',
                success: function (data) {

                    var obj = JSON.parse(data);
                    console.log(obj.status); // <-- display response from the PHP script, if any
                    if (obj.status == "201") {
                        alert("record Delete successfully");
                        setInterval(() => {
                            location.reload();
                        }, 300);
                    }
                    else {
                        alert("Somthing Went Wrong..");
                        setInterval(() => {
                            location.reload();
                        }, 400);
                    }
                }
            });
        }

    });

    // record fetch edit

    $('#editRecord').on('click', function () {

        $.ajax({
            url: '../controllers/fetchData.php', // <-- point to server-side PHP script
            data: {
                "record_id": $(this).val()
            },
            type: 'post',
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj.status); // <-- display response from the PHP script, if any
                if (obj.status == "201") {
                    $("#recordID").val(obj.id);
                    $("#updateauthor").val(obj.author);
                    $("#updatetitle").val(obj.title);
                    $("#updategenre").val(obj.genre);
                    $("#updateprice").val(obj.price);
                    $("#updatepublish_date").val(obj.publish_date);
                    $("#updatedescription").val(obj.description);
                }
                else {
                    alert("Somthing Went Wrong..");
                    setInterval(() => {
                        location.reload();
                    }, 400);
                }
            }
        });

    });

    // update Record

    $('#updateRecord').on('click', function () {

        $.ajax({
            url: '../controllers/recordUpdate.php', // <-- point to server-side PHP script
            data: {
                "record_id": $("#recordID").val(),
                "author": $("#updateauthor").val(),
                "title": $("#updatetitle").val(),
                "genre": $("#updategenre").val(),
                "price": $("#updateprice").val(),
                "publish_date": $("#updatepublish_date").val(),
                "description": $("#updatedescription").val()
            },
            type: 'post',
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj.status); // <-- display response from the PHP script, if any
                if (obj.status == "201") {
                    alert("record Update successfully");
                    setInterval(() => {
                        location.reload();
                    }, 300);
                }
                else {
                    alert("Somthing Went Wrong..");
                    setInterval(() => {
                        location.reload();
                    }, 400);
                }
            }
        });

    });
});
