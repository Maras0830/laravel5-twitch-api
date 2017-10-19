<?php
namespace Maras0830\TwitchApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ApiServiceFacade
 * @package Skmetaly\TwitchApi\Facades
 */
class ApiServiceFacade extends Facade{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'Maras0830\TwitchApi\Services\ApiService'; }
}