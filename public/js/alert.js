function calert(msg) {
    $('#AlertContainer, #AlertContent').addClass('active');
    $('#AlertMSG').html(msg);
    $('#AlertClose').click(function () {
        $('#AlertContainer, #AlertContent').removeClass('active');
    });
}

