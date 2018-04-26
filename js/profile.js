 $('#save-btn').click(function () {
            var name = $('#Input').val();
            //$('#name-data').text(name);
            var saveReq = $.ajax({
                type: 'POST',
                url : 'profile_firstname.php',
                data: {
                    "name" : name
                },
                dataType: 'text',
            });
            saveReq.done(function (data) {
                console.log(data);
                $('#name-data').text(data);
            });
    });


