<?php

return [
    'api_url' => "https://api.twitch.tv",
    'client_id' => env('your-twitch-client_id', ''),
    'client_secret' => env('your-twitch-client_secret', ''),
    'redirect_url' => env('your-twitch-redirect_url', ''),
    'scopes' => [
        'user_read',
        'user_blocks_edit',
        'user_blocks_read',
        'user_follows_edit',
        'channel_read',
        'channel_editor',
        'channel_commercial',
        'channel_stream',
        'channel_subscriptions',
        'channel_feed_edit',
        'user_subscriptions',
        'channel_check_subscription',
        'chat_login'
    ]
];