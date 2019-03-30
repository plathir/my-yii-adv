$(document).ready(
        $(".install-form").on('beforeSubmit', function (event, jqXHR, settings) {
    var form = $(this);
    if (form.find('.has-error').length) {
        return false;
    }
    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: data

    })
            .done(function (response) {
                if (response.data.success == true) {
                    DisableFields();
                    DisplayMessages(response.data.message);
                    console.log(response.data.data);
                }
            })
            .fail(function () {
                console.log(url + "error");
            });

    return false;
}),
        );

function DisableFields() {
    $("#btnSubmit").attr("disabled", true);

}

function DisplayMessages(message) {
    console.log("message : " + message);
    $("div.resultsdiv").html(message);

}

  