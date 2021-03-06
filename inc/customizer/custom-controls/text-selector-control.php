<?php

/** Text Selector Control */
class Online_Magazine_Text_Selector_Control extends WP_Customize_Control {

    public $type = 'online-magazine-text-selector';
    public $class = '';

    public function __construct($manager, $id, $args = array()) {
        parent::__construct($manager, $id, $args);
        
        $this->choices = $args['choices'];
        $this->class = isset($args['class']) ? $args['class'] : '';
    }

    public function render_content() {
        if (!empty($this->choices)) {
            ?>
            <label>
                <div class="online-magazine-text-radio-container <?php echo esc_attr($this->class) ?>">
                    <span class="customize-control-title">
                        <?php echo esc_html($this->label); ?>
                    </span>

                    <div class="online-magazine-text-radio-buttons">
                        <?php foreach ($this->choices as $key => $value) { ?>
                            <label class="online-magazine-text-radio-button-label">
                                <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                                <div class="online-magazine-text-radio">
                                    <?php
                                    if (isset($value['icon'])) {
                                        echo '<span class="' . esc_attr($value['icon']) . '"></span>';
                                    }

                                    if (isset($value['label'])) {
                                        echo esc_html($value['label']);
                                    }
                                    ?>
                                </div>
                            </label>
                        <?php } ?>
                    </div>
                </div>
                <?php if (!empty($this->description)) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

            </label>
            <?php
        }
    }

}
