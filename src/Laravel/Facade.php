<?php

namespace NewsWhip\Laravel;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @see \NewsWhip\Client
 */
class Facade extends LaravelFacade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {

		return 'newswhip';

	}

}
