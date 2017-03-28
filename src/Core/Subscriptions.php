<?php
namespace Maras0830\TwitchApi\Core;



/**
 * Class Subscriptions
 * @package Maras0830\TwitchApi\Core
 */
class Subscriptions extends Base
{

    /**
     * Returns a list of subscription objects sorted by subscription relationship creation date which contain users subscribed to :channel.
     *
     * @required scope: channel_subscriptions
     *
     * @param      $channel
     * @param      $options
     * @param null $token
     * @return mixed
     */
    public function getSubscriptionsByChannel($channel, $options = [], $token = null)
    {
        $defaultOptions = ['limit', 'offset', 'direction'];

        $query = [];

        $token = $this->getToken($token);

        //  Filter the available options
        foreach ($defaultOptions as $option) {

            if (isset($options[ $option ])) {

                $query[ $option ] = $options[ $option ];
            }
        }

        $parameters = $this->getDefaultHeaders($token);

        $parameters[ 'query' ] = $query;

        try {
            $response = $this->client->request('GET', '/kraken/channels/' . $channel . '/subscriptions', $parameters);
            return json_decode($response->getBody()->getContents());
        } catch (\Exception $e) {
            return null;
            //return $e->getCode();
        }
    }

    /**
     * Returns a subscription object which includes the user if that user is subscribed. Requires authentication for :channel.
     *
     * @required scope: channel_check_subscription
     *
     * @param      $channel
     * @param      $user
     * @param null $token
     * @return mixed
     */
    public function getChannelSubscriptionsContainUser($channel, $user, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->request('GET', '/channels/' . $channel . '/subscriptions/' . $user, $parameters);

        return json_decode($response->getBody()->getContents());
    }

    /**
     *Returns a channel object that user subscribes to. Requires authentication for :user.
     *
     * @required scope: user_subscriptions
     *
     * @param      $user
     * @param      $channel
     * @param null $token
     * @return mixed
     */
    public function getUserSubscriptionsContainChannel($user, $channel, $token = null)
    {
        $token = $this->getToken($token);

        $parameters = $this->getDefaultHeaders($token);

        $response = $this->client->request('GET', '/users/' . $user . '/subscriptions/' . $channel, $parameters);

        return json_decode($response->getBody()->getContents());
    }

}
