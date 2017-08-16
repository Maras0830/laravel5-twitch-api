<?php
namespace Maras0830\TwitchApi\Core;

use GuzzleHttp\Client;


/**
 * Class Chat
 * @package Maras0830\TwitchApi\Core
 */
class Chat extends Base
{

    /**
     * Returns a links object to all other chat endpoints.
     *
     * @param $channel
     * @return mixed
     */
    public function chatChannel($channel)
    {
        $parameters = $this->getDefaultHeaders();

        $response = $this->client->request('GET', 'kraken/chat/' . $channel, $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Returns a list of all emoticon objects for Twitch.
     *
     * @param $channel
     * @return mixed
     */
    public function chatBadges($channel)
    {
        $parameters = $this->getDefaultHeaders();

        $response = $this->client->request('GET', 'kraken/chat/' . $channel . '/badges', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Returns a list of all emoticon objects for Twitch.
     *
     * @return mixed
     */
    public function chatEmoticons()
    {
        $parameters = $this->getDefaultHeaders();

        $response = $this->client->request('GET', '/kraken/chat/emoticons', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Returns a list of emoticons.
     *
     * @return mixed
     */
    public function chatEmoticonImages()
    {
        $parameters = $this->getDefaultHeaders();
        
        $response = $this->client->request('GET', '/kraken/chat/emoticon_images', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }
}