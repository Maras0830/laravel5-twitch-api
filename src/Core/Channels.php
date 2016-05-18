<?php
namespace Maras0830\TwitchApi\Core;

use GuzzleHttp\Client;

/**
 * Class Channels
 * @package Maras0830\TwitchApi\Core
 */
class Channels extends Base
{

    /**
     * Get channel object.
     *
     * @param $channel
     * @return mixed
     */
    public function channel($channel)
    {
        $channel = $this->client->get('/kraken/channels/' . $channel);

        return $channel->json();
    }

    /**
     * Get authenticated channel object.
     *
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function authenticatedChannel($token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->get('/kraken/channel', $parameters);

        return $response->json();
    }


    /**
     * Returns a list of team objects :channel belongs to.
     *
     * @param $channel
     * @return mixed
     */
    public function GetChannelTeams($channel)
    {
        $channel = $this->client->get('/kraken/channels/' . $channel . '/teams');

        return $channel->json();
    }

    /**
     * Update channel's properties.
     *
     * @param $channel
     * @param $options
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function putChannel($channel, $options, $token = null)
    {
        $token = $this->getToken($token);

        $defaultOptions = ['status', 'game', 'delay'];

        $channelOptions = [];

        foreach ($defaultOptions as $option) {
            if (isset($options[ $option ])) {
                $channelOptions[ $option ] = $options[ $option ];
            }
        }
        $parameters = $this->getDefaultHeaders($token);

        $parameters['headers']['Content-type'] = ['application/json'];

        $parameters['json'] = ['channel' => $channelOptions];

        $response = $this->client->put('/kraken/channels/' . $channel, $parameters);

        return $response->json();
    }

    /**
     * Resets channel's stream key.
     *
     * @param $channel
     * @param null $token
     * @return mixed
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function deleteStreamKey($channel, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->delete('/kraken/channels/' . $channel. '/stream_key', $parameters);

        return $response->json();
    }

    /**
     * Start commercial on channel.
     *
     * @param $channel
     * @param int $length
     * @param null $token
     * @throws \Maras0830\TwitchApi\Exceptions\AuthenticationException
     */
    public function postCommercial($channel, $length = 30, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $parameters['body'] = ['length' => $length];

        $response = $this->client->post('/channels/' . $channel . '/commercial', $parameters);

        $response->json();
    }

}
