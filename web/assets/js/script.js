/**
 * Created by Mike Kr on 22.10.2017.
 */
(function ($) {
    $(function () {

        $('.phone').inputmask('+375-99-999-99-99');

        $('#save_contacts').click(function(){
            $('.error').hide();
            $('#contact_form').ajaxSubmit({
                success: function(res) {
                    if (res.status == 'fail') {
                        $.each( res.fields, function( f, field ) {
                            $('input[name='+field+']').parent('p').siblings('.error').show();
                        });
                    }
                }
            });
        });

    });
})(jQuery);