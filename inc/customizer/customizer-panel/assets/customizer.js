jQuery(document).ready(function ($) {
    "use strict";

    wp.customize('online_magazine_website_layout', function (setting) {
        var setupWideLayout = function (control) {
            var visibility = function () {
                if ('wide' === setting.get() || 'boxed' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupBoxedLayout = function (control) {
            var visibility = function () {
                if ('boxed' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupFluidLayout = function (control) {
            var visibility = function () {
                if ('fluid' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control('online_magazine_wide_container_width', setupWideLayout);
        wp.customize.control('online_magazine_container_padding', setupBoxedLayout);
        wp.customize.control('online_magazine_fluid_container_width', setupFluidLayout);
    });

    wp.customize('online_magazine_common_header_typography', function (setting) {
        var setupControlCommonTypography = function (control) {
            var visibility = function () {
                if (setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var setupControlSeperateTypography = function (control) {
            var visibility = function () {
                if (setting.get()) {
                    control.container.addClass('customizer-hidden');
                } else {
                    control.container.removeClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };
        

        wp.customize.control('online_magazine_h_typography', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh1_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh2_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh3_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh4_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh5_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_hh6_size', setupControlCommonTypography);
        wp.customize.control('online_magazine_h_typography_seperator', setupControlCommonTypography);
        wp.customize.control('header_typography_note', setupControlCommonTypography);
        wp.customize.control('online_magazine_header_typography_nav', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h1_typography', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h2_typography', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h3_typography', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h4_typography', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h5_typography', setupControlSeperateTypography);
        wp.customize.control('online_magazine_h6_typography', setupControlSeperateTypography);
    });

    //Scroll to section
    $('body').on('click', '#sub-accordion-panel-online_magazine_home_panel .control-subsection .accordion-section-title', function (event) {
        var section_id = $(this).parent('.control-subsection').attr('id');
        TotalscrollToSection(section_id);
    });

    //Homepage Section Sortable
    function online_magazine_sections_order(container) {
        var sections = $(container).sortable('toArray');
        var sec_ordered = [];
        $.each(sections, function (index, sec_id) {
            sec_id = sec_id.replace("accordion-section-", "");
            sec_ordered.push(sec_id);
        });

        $.ajax({
            url: ajaxurl,
            type: 'post',
            dataType: 'html',
            data: {
                'action': 'online_magazine_order_sections',
                'sections': sec_ordered,
            }
        }).done(function (data) {
            $.each(sec_ordered, function (key, value) {
                wp.customize.section(value).priority(key);
            });
            $(container).find('.online-magazine-drag-spinner').hide();
            wp.customize.previewer.refresh();
        });
    }

    $('#sub-accordion-panel-online_magazine_home_panel').sortable({
        axis: 'y',
        helper: 'clone',
        cursor: 'move',
        items: '> li.control-section:not(#accordion-section-online_magazine_slider_section):not(#accordion-section-online-magazine-upgrade-section)',
        delay: 150,
        update: function (event, ui) {
            $('#sub-accordion-panel-online_magazine_home_panel').find('.online-magazine-drag-spinner').show();
            online_magazine_sections_order('#sub-accordion-panel-online_magazine_home_panel');
            $('.wp-full-overlay-sidebar-content').scrollTop(0);
        }
    });
});


function TotalscrollToSection(section_id) {
    var preview_section_id = "ht-home-slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch (section_id) {
        case 'accordion-section-online_magazine_slider_section':
            preview_section_id = "ht-home-slider-section";
            break;

        case 'accordion-section-online_magazine_about_section':
            preview_section_id = "ht-about-us-section";
            break;

        case 'accordion-section-online_magazine_featured_section':
            preview_section_id = "ht-featured-post-section";
            break;

        case 'accordion-section-online_magazine_portfolio_section':
            preview_section_id = "ht-portfolio-section";
            break;

        case 'accordion-section-online_magazine_service_section':
            preview_section_id = "ht-service-post-section";
            break;

        case 'accordion-section-online_magazine_team_section':
            preview_section_id = "ht-team-section";
            break;

        case 'accordion-section-online_magazine_testimonial_section':
            preview_section_id = "ht-testimonial-section";
            break;

        case 'accordion-section-online_magazine_counter_section':
            preview_section_id = "ht-counter-section";
            break;

        case 'accordion-section-online_magazine_blog_section':
            preview_section_id = "ht-blog-section";
            break;

        case 'accordion-section-online_magazine_logo_section':
            preview_section_id = "ht-logo-section";
            break;

        case 'accordion-section-online_magazine_cta_section':
            preview_section_id = "ht-cta-section";
            break;
    }

    if ($contents.find('#' + preview_section_id).length > 0) {
        $contents.find("html, body").animate({
            scrollTop: $contents.find("#" + preview_section_id).offset().top
        }, 1000);
    }

   
}