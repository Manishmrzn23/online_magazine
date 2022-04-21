jQuery(document).ready(function ($) {
    $("body").on("click", ".online-magazine-switch-section.online-magazine-switch", function () {
        var controlName = $(this).siblings("input").data("customize-setting-link");
        var controlValue = $(this).siblings("input").val();
        var iconClass = "dashicons-visibility";
        if (controlValue === "off") {
            iconClass = "dashicons-hidden";
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("online-magazine-section-hidden")
                    .removeClass("online-magazine-section-visible");
        } else {
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("online-magazine-section-visible")
                    .removeClass("online-magazine-section-hidden");
        }
        $("[data-control=" + controlName + "]")
                .children()
                .attr("class", "dashicons " + iconClass);
    });
});
