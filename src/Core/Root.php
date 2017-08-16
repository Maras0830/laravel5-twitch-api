<?php
namespace Maras0830\TwitchApi\Core;


/**
 * Class Root
 * @package Maras0830\TwitchApi\Core
 */
class Root extends Base
{

    /**
     * Basic information about the API and authentication status. If you are authenticated, the response includes the status of your token and links to other related resources.
     *
     * @return mixed
     */
    public function root()
    {
        $parameters = $this->getDefaultHeaders();

        $response = $this->client->request('GET', '/kraken', $parameters);

        return json_decode($response->getBody()->getContents(), true);
    }
}