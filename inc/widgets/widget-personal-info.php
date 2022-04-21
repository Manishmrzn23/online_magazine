<?php
/**
 * @package Online Magazine
 */
add_action('widgets_init', 'online_magazine_register_personal_info');

function online_magazine_register_personal_info() {
    register_widget('online_magazine_personal_info');
}

class online_magazine_personal_info extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'online_magazine_personal_info', 'Online Magazine : Personal Info', array(
            'description' => esc_html__('A widget to display Personal Information', 'online-magazine')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            'title' => array(
                'online_magazine_widgets_name' => 'title',
                'online_magazine_widgets_title' => esc_html__('Title', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
            'image' => array(
                'online_magazine_widgets_name' => 'image',
                'online_magazine_widgets_title' => esc_html__('Image', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'upload',
            ),
            'intro' => array(
                'online_magazine_widgets_name' => 'intro',
                'online_magazine_widgets_title' => esc_html__('Short Intro', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'textarea',
                'online_magazine_widgets_row' => '4'
            ),
            'signature' => array(
                'online_magazine_widgets_name' => 'name',
                'online_magazine_widgets_title' => esc_html__('Name', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
             'link_one' => array(
                'online_magazine_widgets_name' => 'link_one',
                'online_magazine_widgets_title' => esc_html__('Website Url', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
             'link_two' => array(
                'online_magazine_widgets_name' => 'link_two',
                'online_magazine_widgets_title' => esc_html__('Twitter Url', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
             'link_three' => array(
                'online_magazine_widgets_name' => 'link_three',
                'online_magazine_widgets_title' => esc_html__('Facebook Url', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
             'link_four' => array(
                'online_magazine_widgets_name' => 'link_four',
                'online_magazine_widgets_title' => esc_html__('Youtube Url', 'online-magazine'),
                'online_magazine_widgets_field_type' => 'text',
            ),
           
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);

        $title = isset($instance['title']) ? $instance['title'] : '';
        $image = isset($instance['image']) ? $instance['image'] : '';
        $intro = isset($instance['intro']) ? $instance['intro'] : '';
        $name = isset($instance['name']) ? $instance['name'] : '';
        $link_one = isset($instance['link_one']) ? $instance['link_one'] : '';
        $link_two = isset($instance['link_two']) ? $instance['link_two'] : '';
        $link_three = isset($instance['link_three']) ? $instance['link_three'] : '';
        $link_four = isset($instance['link_four']) ? $instance['link_four'] : '';

        echo $before_widget;
        ?>
        <div class="widget atbs-widget atbs-widget--about">
            <div class="widget__title text-center">
                <?php
                    if (!empty($title)):?>
                        <h4 class="widget__title-text"><?php echo $before_title . esc_html($title) . $after_title; ?></h4>
                    <?php endif;?>
            </div>   
            <div class="atbs-widget__inner">
                <div class="widget__content text-center">
                    <div class="author__avatar">
                        <?php
                        if (!empty($image)):
                            $image_id = attachment_url_to_postid($image);

                            if ($image_id) {
                                $image_array = wp_get_attachment_image_src($image_id, 'full');
                            
                                echo '<img alt="' . esc_html($title) . '" src="' . esc_url($image_array[0]) . '"/>';
                            } else {
                                echo '<img alt="' . esc_html($title) . '" src="' . esc_url($image) . '"/>';
                            }
                        endif;?>
                    </div>
                    <div class="author__name">
                        <?php 
                        if (!empty($name)):
                                echo '<a href="author.html">' . esc_html($name) . '</a>';
                        endif;?>
                    </div>
                    <div class="author__text">
                        <?php
                        if (!empty($intro)):
                            echo ' <span class="line-limit line-limit-4">' . esc_html($intro) . '</span>';
                        endif;?>
                    </div>
                    <div class="author__social">
                        <ul class="social-list social-list--sm list-horizontal">
                            <li>
                                <?php 
                                if (!empty($link_one)){
                               echo '<a href="'.esc_url(esc_html($link_one)).'" target="_blank"><i class="mdicon mdicon-public"></i>
                                    <span class="sr-only">Website</span></a>';
                                }  
                                ?>      
                            </li>
                            <li>
                               <?php 
                                if (!empty($link_two)){
                               echo '<a href="'.esc_url(esc_html($link_two)).'" target="_blank"><i class="mdicon mdicon-twitter"></i>
                                    <span class="sr-only">Twitter</span></a>';
                                }  
                                ?>
                            </li>
                            <li>
                                <?php 
                                if (!empty($link_three)){
                               echo '<a href="'.esc_url(esc_html($link_three)).'" target="_blank"><i class="mdicon mdicon-facebook"></i>
                                    <span class="sr-only">Facebook</span></a>';
                                }  
                                ?>
                            </li>
                            <li>
                                <?php 
                                if (!empty($link_four)){
                               echo '<a href="'.esc_url(esc_html($link_four)).'" target="_blank"><i class="mdicon mdicon-youtube"></i>
                                    <span class="sr-only">Youtube</span></a>';
                                }  
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                                       
                                        
                    
    
        
        <?php
        echo $after_widget;
    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	online_magazine_widgets_updated_field_value()		defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$online_magazine_widgets_name] = online_magazine_widgets_updated_field_value($widget_field, $new_instance[$online_magazine_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	online_magazine_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $online_magazine_widgets_field_value = !empty($instance[$online_magazine_widgets_name]) ? esc_attr($instance[$online_magazine_widgets_name]) : '';
            online_magazine_widgets_show_widget_field($this, $widget_field, $online_magazine_widgets_field_value);
        }
    }

}
