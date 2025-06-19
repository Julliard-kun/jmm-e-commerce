<?php
/**
 * Customizer Custom Controls
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Toggle Switch Custom Control
	 */
	class Ecommerce_Clothing_Toggle_Switch_Custom_Control extends WP_Customize_Control {
		public $type = 'toggle_switch';
		public function render_content() {
			?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" 
					<?php
						$this->link();
						checked( $this->value() );
					?>
					>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
			<?php
		}
	}

	/**
	 * Separator/Heading Custom Control
	 */
	class Ecommerce_Clothing_Separator_Custom_Control extends WP_Customize_Control {
		public $type = 'separator';
		public function render_content() {
			?>
			<div class="separator-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<hr />
			</div>
			<?php
		}
	}

	class Ecommerce_Clothing_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {
			if (empty($this->choices)) return;
	
			$ecommerce_clothing_name = '_customize-radio-' . $this->id;
			?>
			
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
		   
			<ul class="controls" id='ecommerce-clothing-custom-container'>
				<?php
				
				foreach ($this->choices as $ecommerce_clothing_value => $ecommerce_clothing_label) :
					
					$class = ($this->value() == $ecommerce_clothing_value) ? 'ecommerce-clothing-selected-img ecommerce-clothing-selector-img ' : 'ecommerce-clothing-selector-img';
					?>
					
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?> style='display:none' type="radio" value="<?php echo esc_attr($ecommerce_clothing_value); ?>" name="<?php echo esc_attr($ecommerce_clothing_name); ?>" <?php
								  $this->link();
								  checked($this->value(), $ecommerce_clothing_value);
								  ?> />
	
							<img src='<?php echo esc_url($ecommerce_clothing_label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
	
			<script type="text/javascript">
				(function($) {
					$(document).ready(function() {
						$('#ecommerce-clothing-custom-container img').on('click', function() {
							var $this = $(this);
							var input = $this.prev('input');
							var inputName = input.attr('name');
	
							// Remove the 'ecommerce-clothing-selected-img' class from all images
							$('#ecommerce-clothing-custom-container img').removeClass('ecommerce-clothing-selected-img');
	
							// Add the 'ecommerce-clothing-selected-img' class to the clicked image
							$this.addClass('ecommerce-clothing-selected-img');
	
							// Set the input as checked
							input.prop('checked', true).trigger('change');
	
							// Optionally: Update the WordPress Customizer to reflect the change
							wp.customize.control(inputName).setting.set(input.val());
						});
					});
				})(jQuery);
			</script>
			<?php
		}
	}

	// Add Ecommerce_Clothing_Customize_Range_Control
	class Ecommerce_Clothing_Customize_Range_Control extends WP_Customize_Control {
		public $type = 'ecommerce-clothing-range-slider';

		public function to_json() {
			if ( ! empty( $this->setting->default ) ) {
				$this->json['default'] = $this->setting->default;
			} else {
				$this->json['default'] = false;
			}
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'ecommerce-clothing-range-slider', get_template_directory_uri() . '/resource/js/range-control.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'ecommerce-clothing-range-slider', get_template_directory_uri() . '/resource/css/range-control.css' );
		}

		public function render_content() {
			?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<div id="<?php echo esc_attr( $this->id ); ?>">
					<div class="ecommerce-clothing-range-slider">
						<input class="ecommerce-clothing-range-slider-range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<input class="ecommerce-clothing-range-slider-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<?php if ( ! empty( $this->setting->default ) ) : ?>
							<span class="ecommerce-clothing-range-reset-slider" title="<?php esc_attr_e( 'Reset', 'ecommerce-clothing' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
						<?php endif;?>
					</div>
				</div>
			</label>
			<?php
		}
	}

}

if ( class_exists( 'WP_Customize_Section' ) ) {
	/**
	 * Upsell section
	 */
	class Ecommerce_Clothing_Upsell_Section extends WP_Customize_Section {
		/**
		 * The type of control being rendered
		 */
		public $type = 'ecommerce-clothing-upsell';

		/**
		 * The Upsell button text
		 */
		public $button_text = '';

		/**
		 * The Upsell URL
		 */
		public $url = '';

		/**
		 * The background color for the control
		 */
		public $background_color = '';

		/**
		 * The text color for the control
		 */
		public $text_color = '';

		/**
		 * Render the section, and the controls that have been added to it.
		 */
		protected function render() {
			$background_color = ! empty( $this->background_color ) ? esc_attr( $this->background_color ) : '#fff';
			$text_color       = ! empty( $this->text_color ) ? esc_attr( $this->text_color ) : '#50575e';
			$section_class    = esc_attr( $this->id ); // Use the section ID as the class name
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="ecommerce_clothing_Upsell_Section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand <?php echo $section_class; ?>">
				<h3 class="accordion-section-title" style="color:<?php echo esc_attr( $text_color ); ?>; background:<?php echo esc_attr( $background_color ); ?>;border-left-color:<?php echo esc_attr( $background_color ); ?>;">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}