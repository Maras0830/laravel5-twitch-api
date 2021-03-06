<?php
namespace Maras0830\TwitchApi\Core;


/**
 * Class Blocks
 * @package Maras0830\TwitchApi\Core
 */
class Blocks extends Base
{

    /**
     * Get user's block list
     *
     * @param $login
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function getBlocksList($user, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->request('GET', '/kraken/users/' . $user . '/blocks', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Add target to user's block list
     *
     * @param $user
     * @param $target
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function putBlockList($user, $target, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->put('/kraken/users/' . $user . '/blocks/'. $target, $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Delete target from user's block list
     *
     * @param $user
     * @param $target
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function deleteBlock($user, $target, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->delete('/kraken/users/' . $user . '/blocks/'. $target, $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }
}