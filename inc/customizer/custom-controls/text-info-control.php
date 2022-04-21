<?php

/** Info Text Control */
class Online_Magazine_Text_Info_Control extends WP_Customize_Control {

    public function render_content() {
        ?>
        <div <?php $this->input_attrs(); ?>>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>

            <?php if ($this->description) { ?>
                <span class="customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
            ?>
        </div>
        <?php
    }

}
