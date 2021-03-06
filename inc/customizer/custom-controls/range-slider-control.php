<?php

/** Range Control */
class Online_Magazine_Range_Slider_Control extends WP_Customize_Control {

    /**
     * The type of control being rendered
     */
    public $type = 'online-magazine-range-slider';
    public $unit = '';

    public function __construct($manager, $id, $args = array()) {
        if (isset($args['unit'])) {
            $this->unit = $args['unit'];
        }
        parent::__construct($manager, $id, $args);
    }

    /**
     * Render the control in the customizer
     */
    public function render_content() {
        ?>
        <span class="customize-control-title">
            <?php echo esc_html($this->label); ?>
            <span class="online-magazine-slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr($this->value()); ?>"></span>
        </span>

        <div class="online-magazine-range-slider-control-wrap"> 
            <div class="online-magazine-range-slider" slider-min-value="<?php echo esc_attr($this->input_attrs['min']); ?>" slider-max-value="<?php echo esc_attr($this->input_attrs['max']); ?>" slider-step-value="<?php echo esc_attr($this->input_attrs['step']); ?>"></div>
            <div class="online-magazine-range-slider-input">
                <input type="number" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
            </div>

            <?php if ($this->unit) { ?>
                <div class="online-magazine-range-slider-unit">
                    <?php echo esc_html($this->unit); ?>
                </div>
            <?php } ?>
        </div>

        <?php
        if ($this->description) {
            ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }
    }

}
