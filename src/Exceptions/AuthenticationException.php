<?php
namespace Maras0830\TwitchApi\Exceptions;

use Exception;

/**
 * Class AuthenticationException
 * @package Maras0830\TwitchApi\Exceptions
 */
class AuthenticationException extends Exception {

    /**
     *
     */
    public function __construct()
    {
        $this->message = 'Authentication failed.';
    }
}