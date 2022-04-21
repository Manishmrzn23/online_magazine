<?php

/** Checkbox Control */
class Online_Magazine_Toggle_Control extends WP_Customize_Control {

    /**
     * Control type
     *
     * @var string
     */
    public $type = 'online-magazine-toggle';

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <div class="online-magazine-toggle-container">
            <div class="online-magazine-toggle">
                <input class="online-magazine-toggle-checkbox" type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> <?php checked($this->value()); ?>>
                <label class="online-magazine-toggle-label" for="<?php echo esc_attr($this->id); ?>"></label>
            </div>
            <span class="customize-control-title online-magazine-toggle-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) { ?>
                <span class="description customize-control-description">
                    <?php echo $this->description; ?>
                </span>
            <?php } ?>
        </div>
        <?php
    }

}
