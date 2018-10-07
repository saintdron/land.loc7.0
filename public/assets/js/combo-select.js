$(function () {
    $('.combo-select').each(function () {
        $('select', this).on('change', function () {
            if ($(this).find(':selected').hasClass('editable')) {
                $(this).next('input').show().focus();
            } else {
                $(this).next('input').hide();
            }
        });

        $('select', this).on('focus', function () {
            if ($(this).find(':selected').hasClass('editable')) {
                $(this).next('input').show().focus();
            }
        });

        $('input', this).on('focus', function () {
            let $editable = $(this).prev('select').find('.editable');
            let text = $editable.val();
            $(this).val(text);
        });

        $('input', this).on('blur', function () {
            let $editable = $(this).prev('select').find('.editable');
            let text = $(this).val();
            $editable.text(text).val(text);
            $(this).hide();
        });

        $('input', this).on('keyup', function () {
            let $editable = $(this).prev('select').find('.editable');
            $editable.text('');
        });
    });
});
