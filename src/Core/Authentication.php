<?php
namespace Maras0830\TwitchApi\Core;

use GuzzleHttp\Client;

/**
 * Class Authentication
 * @package Maras0830\TwitchApi\Core
 */
class Authentication extends Base
{
    /**
     * @return string
     */
    public function authenticationURL()
    {
        $clientId = config('twitch-api.client_id');
        $scopes = implode('+', config('twitch-api.scopes'));
        $redirectURL = config('twitch-api.redirect_url');

        return config('twitch-api.api_url') . '/kraken/oauth2/authorize?response_type=code&client_id=' . $clientId . '&redirect_uri=' . $redirectURL . '&scope=' . $scopes;
    }

    /**
     * @param $code
     * @return mixed
     * @throws \Exception
     */
    public function requestToken($code)
    {
        $parameters = [
            'client_id' => config('twitch-api.client_id'),
            'client_secret' => config('twitch-api.client_secret'),
            'redirect_uri' => config('twitch-api.redirect_url'),
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];

        try {
            $client = new Client();

            $response = $client->request('POST', config('twitch-api.api_url') . '/kraken/oauth2/token', ['form_params' => $parameters]);

            $response = json_decode($response->getBody()->getContents());

            if (isset($response->access_token))
                return $response->access_token;

        } catch (\Exception $e) {

            throw $e;
        }
    }
}
