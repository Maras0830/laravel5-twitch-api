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
        try {
            $parameters = $this->getDefaultHeaders();
            
            $channel = $this->client->request('GET', '/kraken/channels/' . $channel, $parameters);
        } catch (\Exception $e) {
            return null;
        }

        return json_decode($channel->getBody()->getContents());
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

        $response = $this->client->request('GET', '/kraken/channel', $parameters);

        return json_decode($response->getBody()->getContents());
    }


    /**
     * Returns a list of team objects :channel belongs to.
     *
     * @param $channel
     * @return mixed
     */
    public function GetChannelTeams($channel)
    {
        $channel = $this->client->request('GET', '/kraken/channels/' . $channel . '/teams');

        return json_decode($channel->getBody()->getContents());
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

        return json_decode($response->getBody()->getContents());
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

        return json_decode($response->getBody()->getContents());
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

        json_decode($response->getBody()->getContents());
    }

}
