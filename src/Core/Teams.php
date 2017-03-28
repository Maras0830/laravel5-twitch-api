<?phpnamespace Maras0830\TwitchApi\Core;/** * Class Teams * @package Maras0830\TwitchApi\Core */class Teams extends Base{    /**     * Returns a list of active teams.     *     * @return mixed     */    public function teams()    {        $response = $this->client->request('GET', '/kraken/teams');        return json_decode($response->getBody()->getContents());    }    /**     * Returns a team object for :team.     *     * @param $team     * @return mixed     */    public function team($team)    {        $response = $this->client->request('GET', '/kraken/teams/' . $team);        return json_decode($response->getBody()->getContents());    }}