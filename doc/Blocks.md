# Blocks

| Method | Name | Description |
| ---- | ---- | --------------- |
| Get | [blocks($user, $token = null)   ](https://github.com/Maras0830/laravel5-twitch-api/blob/master/doc/Blocks.md#blocksuser-token--null) | Get user's block list |
| Put | [putBlock($user, $target, $token = null)](https://github.com/Maras0830/laravel5-twitch-api/blob/master/doc/Blocks.md#putblockuser-target-token--null) | Add target to user's block list
| Delete | [deleteBlock($user, $target, $token = null)](https://github.com/Maras0830/laravel5-twitch-api/blob/master/doc/Blocks.md#deleteblockuser-target-token--null) | Delete target from user's block list

## blocks($user, $token = null)   
*__Authenticated__*, required scope: `user_blocks_read`    

| Name | Required? | Type | Description
| ---- | ---- | ---- | --------------- |
limit | optional  | integer | Maximum number of objects in array. Default is 25. Maximum is 100.
offset | optional | integer | Object offset for pagination. Default is 0.

### Example Response
```json
{
  "_links": {
    "next": "https://api.twitch.tv/kraken/users/test_user1/test_user1?limit=25&offset=25",
    "self": "https://api.twitch.tv/kraken/users/test_user1/test_user1?limit=25&offset=0"
  },
  "blocks": [
    {
      "_links": {
        "self": "https://api.twitch.tv/kraken/users/test_user1/blocks/test_user_troll"
      },
      "updated_at": "2013-02-07T01:04:43Z",
      "user": {
        "_links": {
          "self": "https://api.twitch.tv/kraken/users/test_user_troll"
        },
        "updated_at": "2013-02-06T22:44:19Z",
        "display_name": "test_user_troll",
        "type": "user",
        "bio": "I'm a troll.. Kappa",
        "name": "test_user_troll",
        "_id": 13460644,
        "logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_user_troll-profile_image-9e4de45c9e6744ac-300x300.png",
        "created_at": "2010-06-30T08:26:49Z"
      },
      "_id": 970887
    },
    ...
  ]
}
```

## putBlock($user, $target, $token = null)
*__Authenticated__*, required scope: `user_blocks_edit` 

### Example Response
```json
{
  "_links": {
    "self": "https://api.twitch.tv/kraken/users/test_user1/blocks/test_user_troll"
  },
  "updated_at": "2013-02-07T01:04:43Z",
  "user": {
    "_links": {
      "self": "https://api.twitch.tv/kraken/users/test_user_troll"
    },
    "updated_at": "2013-01-18T22:33:55Z",
    "logo": "http://static-cdn.jtvnw.net/jtv_user_pictures/test_user_troll-profile_image-c3fa99f314dd9477-300x300.jpeg",
    "type": "user",
    "bio": "I'm a troll.. Kappa",
    "display_name": "test_user_troll",
    "name": "test_user_troll",
    "_id": 22125774,
    "created_at": "2011-05-01T14:50:12Z"
  },
  "_id": 287813
}
```

### deleteBlock($user, $target, $token = null)
*__Authenticated__*, required scope: `user_blocks_edit` 

### Example Response

`204 No Content` if successful.

### Errors

`404 Not Found` if `:target` not on `:user`'s block list.

`422 Unprocessable Entity` if delete failed.

