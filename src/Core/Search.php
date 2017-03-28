<?phpnamespace Maras0830\TwitchApi\Core;/** * Class Search * @package Maras0830\TwitchApi\Core */class Search extends Base{    /**     *Returns a list of channel objects matching the search query.     *     * @param $options     * @return mixed     */    public function searchChannels($options)    {        $defaultOptions = ['query', 'limit', 'offset'];        $query = [];        foreach ($defaultOptions as $option) {            if (isset($options[ $option ])) {                $query[ $option ] = $options[ $option ];            }        }        $response = $this->client->request('GET', '/kraken/search/channels', ['query' => $query]);        return json_decode($response->getBody()->getContents());    }    /**     * Returns a list of stream objects matching the search query.     *     * @param $options     * @return mixed     */    public function searchStreams($options)    {        $defaultOptions = ['query', 'limit', 'offset', 'hls'];        $query = [];        foreach ($defaultOptions as $option) {            if (isset($options[ $option ])) {                $query[ $option ] = $options[ $option ];            }        }        $response = $this->client->request('GET', '/kraken/search/streams', ['query' => $query]);        return json_decode($response->getBody()->getContents());    }    /**     * Returns a list of game objects matching the search query.     *     * @param $options     * @return mixed     */    public function searchGames($options)    {        $defaultOptions = ['query', 'type', 'live'];        $query = [];        foreach ($defaultOptions as $option) {            if (isset($options[ $option ])) {                $query[ $option ] = $options[ $option ];            }        }        $response = $this->client->request('GET', '/kraken/search/games', ['query' => $query]);        return json_decode($response->getBody()->getContents());    }}