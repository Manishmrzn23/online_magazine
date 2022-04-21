<?php

class Online_Magazine_Column_Control extends WP_Customize_Control {

    public $type = 'online-magazine-column';

    public function __construct($manager, $id, $args = array()) {
        parent::__construct($manager, $id, $args);
    }

    public function enqueue() {
        wp_enqueue_script('nouislider', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/column-control/assets/nouislider.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true);
        wp_enqueue_script('wNumb', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/column-control/assets/wNumb.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true);
        wp_enqueue_script('online-magazine-column-control', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/column-control/assets/column-control.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true);

        wp_enqueue_style('nouislider', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/column-control/assets/nouislider.css', array(), ONLINE_MAGAZINE_VERSION);
    }

    public function render_content() {

        if (!empty($this->label)) :
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php
        endif;

        if (!empty($this->description)) :
            ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php
        endif;

        echo '<div class="online-magazine-column-selector"></div>';

        echo '<div class="online-magazine-column-selector-buttons">';
        echo '<button class="online-magazine-remove-col"><i class="mdi mdi-minus"></i><span>' . esc_html('Remove Column', 'online-magazine') . '</span></button>';
        echo '<button class="online-magazine-add-col"><i class="mdi mdi-plus"></i><span>' . esc_html('Add Column', 'online-magazine') . '</span></button>';
        echo '<button class="online-magazine-reset-col"><i class="mdi mdi-cached"></i><span>' . esc_html('Reset Column', 'online-magazine') . '</span></button>';
        echo '</div>';
        ?>
        <input type="hidden" value="<?php echo esc_attr($this->value()) ?>" <?php $this->link(); ?> />
        </div>
        <?php
    }

}
