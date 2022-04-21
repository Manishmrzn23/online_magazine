jQuery(document).ready(function ($) {
    $(document).on('change', '.online-magazine-typography-font-family select', function () {
        var font_family = $(this).val();
        var $this = $(this);
        $.ajax({
            url: ajaxurl,
            data: {
                action: 'online_magazine_get_google_font_variants',
                font_family: font_family,
            },
            beforeSend: function () {
                $this.parent('.online-magazine-typography-font-family').next('.online-magazine-typography-font-style').addClass('online-magazine-typography-loading');
            },
            success: function (response) {
                $this.parent('.online-magazine-typography-font-family').next('.online-magazine-typography-font-style').removeClass('online-magazine-typography-loading');
                $this.parent('.online-magazine-typography-font-family').next('.online-magazine-typography-font-style').children('select').html(response).trigger('chosen:updated').trigger('change');
            }
        });
    });

    $('.online-magazine-typography-color .online-magazine-color-picker-hex').wpColorPicker({
        change: function (event, ui) {
            var setting = $(this).attr('data-customize-setting-link');
            var hexcolor = $(this).wpColorPicker('color');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(hexcolor);
            });
        }
    });

    $('.online-magazine-slider-range-font-size').each(function () {
        $(this).slider({
            range: 'min',
            value: 18,
            min: parseInt($(this).attr('min')),
            max: parseInt($(this).attr('max')),
            step: parseInt($(this).attr('step')),
            slide: function (event, ui) {
                $(this).next('.online-magazine-slider-value-font-size').find('span').text(ui.value);
                var setting = $(this).next('.online-magazine-slider-value-font-size').find('span').attr('data-customize-setting-link');

                // Set the new value.
                wp.customize(setting, function (obj) {
                    obj.set(ui.value);
                });
            }
        });

        $(this).slider('value', $(this).next('.online-magazine-slider-value-font-size').find('span').attr('value'));
    });



    $('.online-magazine-slider-range-line-height').slider({
        range: 'min',
        value: 1.5,
        min: 0.8,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.online-magazine-slider-value-line-height').find('span').text(ui.value);
            var setting = $(this).next('.online-magazine-slider-value-line-height').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.online-magazine-slider-range-line-height').each(function () {
        $(this).slider('value', $(this).next('.online-magazine-slider-value-line-height').find('span').attr('value'));
    });

    $('.online-magazine-slider-range-letter-spacing').slider({
        range: 'min',
        value: 0,
        min: -5,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.online-magazine-slider-value-letter-spacing').find('span').text(ui.value);
            var setting = $(this).next('.online-magazine-slider-value-letter-spacing').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.online-magazine-slider-range-letter-spacing').each(function () {
        $(this).slider('value', $(this).next('.online-magazine-slider-value-letter-spacing').find('span').attr('value'));
    });

    // Chosen JS
    $('.customize-control-online-magazine-typography select').chosen({
        width: '100%',
    });
});


(function (api) {

    api.controlConstructor['typography'] = api.Control.extend({
        ready: function () {
            var control = this;

            control.container.on('change', '.online-magazine-typography-font-family select',
                    function () {
                        control.settings['family'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.online-magazine-typography-font-style select',
                    function () {
                        control.settings['style'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.online-magazine-typography-text-transform select',
                    function () {
                        control.settings['text_transform'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.online-magazine-typography-text-decoration select',
                    function () {
                        control.settings['text_decoration'].set(jQuery(this).val());
                    }
            );

        }
    });

})(wp.customize);
