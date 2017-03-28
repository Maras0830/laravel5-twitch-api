<?php
namespace Maras0830\TwitchApi\Core;


/**
 * Class Streams
 * @package Maras0830\TwitchApi\Core
 */
class Streams extends Base
{

    /**
     * Returns a stream object if live.
     *
     * @param $channel
     * @return mixed
     */
    public function getStreamByChannel($channel)
    {
        $parameters = $this->getDefaultHeaders();
      
        $response = $this->client->request('GET', '/kraken/streams/' . $channel, $parameters);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Returns a list of stream objects that are queried by a number of parameters sorted by number of viewers descending.
     *
     * @param $options
     * @return mixed
     */
    public function streams($options)
    {
        $defaultOptions = ['game', 'channel', 'limit', 'offset', 'client_id'];

        $query = [];

        foreach ($defaultOptions as $option) {

            if (isset($options[ $option ])) {

                $query[ $option ] = $options[ $option ];
            }
        }

        $response = $this->client->request('GET', '/kraken/streams/', ['query' => $query]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Returns a list of featured (promoted) stream objects.
     *
     * @param array $options
     * @return mixed
     */
    public function streamsFeatured($options = [])
    {
        $defaultOptions = ['limit', 'offset'];

        $query = [];

        foreach ($defaultOptions as $option) {

            if (isset($options[ $option ])) {

                $query[ $option ] = $options[ $option ];
            }
        }

        $response = $this->client->request('GET', '/kraken/streams/featured', ['query' => $query]);

        return json_decode($response->getBody()->getContents());
    }

    /**
     * Returns a summary of current streams.
     *
     * @param $options
     * @return mixed
     */
    public function streamsSummary($options = [])
    {
        $defaultOptions = ['game', 'limit', 'offset'];

        $query = [];

        foreach ($defaultOptions as $option) {

            if (isset($options[ $option ])) {

                $query[ $option ] = $options[ $option ];
            }
        }

        $response = $this->client->request('GET', '/kraken/streams/summary', ['query' => $query]);

        return json_decode($response->getBody()->getContents());
    }
}
