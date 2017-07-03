<?php
namespace WP_AMP_Themes\Includes;

/**
 * Overall Option Management class
 *
 * Instantiates all the options and offers a number of utility methods to work with the options
 */
class Options
{

	/* ----------------------------------*/
	/* Properties						 */
	/* ----------------------------------*/

	public static $prefix = 'wp_amp_themes';

	public static $options = [
		'theme' => 'obliq'
	];



	/* ----------------------------------*/
	/* Methods							 */
	/* ----------------------------------*/

	/**
	 * The get_setting method is used to read an option value (or options) from the database.
	 *
	 * If the $option param is an array, the method will return an array with the values,
	 * otherwise it will return only the requested option value.
	 *
	 * @param $option - array / string
	 * @return mixed
	 */
	public function get_setting($option) {

		// if the passed param is an array, return an array with all the settings
		if (is_array($option)) {

			$settings = array();

			foreach ($option as $option_name => $option_value) {
				if (get_option(self::$prefix . $option_name) == '')
					$settings[$option_name] = self::$options[$option_name];
				else
					$settings[$option_name] = get_option(self::$prefix . $option_name);
			}

			// return array
			return $settings;

		} elseif (is_string($option)) { // if option is a string, return the value of the option

			// check if the option is added in the db
			if (get_option(self::$prefix . $option) === false) {
				$setting = self::$options[$option];
			} else {
				$setting = get_option(self::$prefix . $option);
			}

			return $setting;
		}

	}


	/**
	 *
	 * The save_settings method is used to save an option value (or options) in the database.
	 *
	 * @param $option - array / string
	 * @param $option_value - optional, mandatory only when $option is a string
	 *
	 * @return bool
	 *
	 */
	public static function save_settings($option, $option_value = '') {

		if (current_user_can('manage_options')) {

			if (is_array($option) && !empty($option)) {

				// set option not saved variable
				$option_not_saved = false;

				foreach ($option as $option_name => $option_value) {

					if (array_key_exists($option_name, self::$options))
						add_option(self::$prefix . $option_name, $option_value);
					else
						$option_not_saved = true; // there is at least one option not in the default list
				}

				if (!$option_not_saved)
					return true;
				else
					return false; // there was an error

			} elseif (is_string($option) && $option_value != '') {

				if (array_key_exists($option, self::$options))
					return add_option(self::$prefix . $option, $option_value);

			}

		}

		return false;

	}

}
