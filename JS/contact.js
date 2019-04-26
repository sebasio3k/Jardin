$(function () {

    window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change')
    }

    window.expiredRecaptchaCallback = function () {
        $('input[data-recaptcha]').val("").trigger('change')
    }

    $('#formRegistro').validator();

    $('#formRegistro').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "./php/contact.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#formRegistro').find('.messages').html(alertBox);
                        $('#formRegistro')[0].reset();
                        grecaptcha.reset();
                    }
                }
            });
            return false;
        }
    })
});