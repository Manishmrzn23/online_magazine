<?php

// Upgrade Text
class Online_Magazine_Upgrade_Info_Control extends WP_Customize_Control {

    public $type = 'online-magazine-upgrade-info';

    public function render_content() {
        ?>
        <label>
            <span class="dashicons dashicons-info"></span>

            <?php if ($this->label) { ?>
                <span>
                    <?php echo wp_kses_post($this->label); ?>
                </span>
            <?php } ?>

            <a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=online-magazine-link&utm_campaign=online-magazine-upgrade'); ?>" target="_blank"> <strong><?php echo esc_html__('Upgrade to PRO', 'online-magazine'); ?></strong></a>
        </label>

        <?php if ($this->description) { ?>
            <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }

        $choices = $this->choices;
        if ($choices) {
            echo '<ul>';
            foreach ($choices as $choice) {
                echo '<li>' . esc_html($choice) . '</li>';
            }
            echo '</ul>';
        }
    }

}
