<?php
namespace Maras0830\TwitchApi\Core;


/**
 * Class Ingests
 * @package Maras0830\TwitchApi\Core
 */
class Ingests extends Base
{
    /**
     * These are RTMP ingest points. By directing an RTMP stream with your stream_key injected into the url_template, you will broadcast your content live on Twitch.
     *
     * @return mixed
     */
    public function ingests()
    {
        $parameters = $this->getDefaultHeaders();

        $response = $this->client->request('GET', '/kraken/ingests', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }
}