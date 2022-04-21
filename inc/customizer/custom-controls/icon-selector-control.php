<?php

/** Icon Chooser */
class Online_Magazine_Icon_Selector_Control extends WP_Customize_Control {

    public $type = 'online-magazine-icon-selector';
    public $icon_array = array();

    public function __construct($manager, $id, $args = array()) {
        if (isset($args['icon_array'])) {
            $this->icon_array = $args['icon_array'];
        }
        parent::__construct($manager, $id, $args);
    }

    public function to_json() {
        parent::to_json();
        $this->json['filter_text'] = esc_attr__('Type to filter', 'online-magazine');
        $this->json['value'] = $this->value();
        $this->json['link'] = $this->get_link();
        if (isset($this->icon_array) && !empty($this->icon_array)) {
            $this->json['icon_array'] = $this->icon_array;
        }
    }

    public function content_template() {
        ?>
        <label>
            <# if ( data.label ) { #>
            <span class="customize-control-title">
                {{{ data.label }}}
            </span>
            <# } #>

            <# if ( data.description ) { #>
            <span class="description customize-control-description">
                {{{ data.description }}}
            </span>
            <# } #>

            <div class="online-magazine-icon-box-wrap">
                <div class="online-magazine-selected-icon">
                    <i class="{{ data.value }}"></i>
                    <span><i class="online-magazine-down-icon"></i></span>
                </div>

                <# if( data.icon_array ) { #>
                <div class="online-magazine-icon-box">
                    <div class="online-magazine-icon-search">
                        <input type="text" class="online-magazine-icon-search-input" placeholder="{{ data.filter_text }}" />
                    </div>

                    <ul class="online-magazine-icon-list online-magazine-clearfix active">
                        <# _.each( data.icon_array, function( val ) { #>
                        <li class="<# if ( val === data.value ) { #> icon-active <# } #>"><i class="{{ val }}"></i></li>
                        <# } ) #>
                    </ul>
                </div>
                <# } #>

                <input type="hidden" value="{{ data.value }}" {{{ data.link }}} />
            </div>
        </label>
        <?php
    }

}
