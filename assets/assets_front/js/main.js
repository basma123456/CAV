$(function() {
    var inputs = $('.sign-up-main input');


    // Start  Sign Up Input remove attribute //

    inputs.on('focus', function() {
        $(this).removeAttr('placeholder');
        $(this).prev('label').removeClass('d-none').animate({ top: '-15px' }, "slow");

    });

    inputs.on('blur', function() {
        $(this).prev('label').animate({ top: '7px' }, "slow").addClass('d-none');
        $(this).attr('placeholder', $(this).prev('label').text());

    });
    // End  Sign Up Input remove attribute //




});