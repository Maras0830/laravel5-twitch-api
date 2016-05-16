# Channel Feed

| Method | Name | Description |
| ---- | ---- | --------------- |
| Get | posts($channel, $options, $token = null) | Get channel feed posts
| Put | putPost($channel, $options, $token = null) | Create post
| Get | post($channel, $post_id, $token = null) | Get post
| Delete | removePost($channel, $post_id, $token = null) | Delete post
| Put | postPostReaction($channel, $post_id, $options , $token = null) | Create reaction to post
| Delete | removePostReaction($channel, $post_id, $options , $token = null)| Delete reaction

## posts($channel, $options, $token = null)  
*__Authenticated__*, required scope: `channel_feed_read`    

| Name | Required? | Type | Description
| ---- | ---- | ---- | --------------- |
limit | optional  | integer | Maximum number of objects in array. Default is 10. Maximum is 100.
cursor | optional | string | Cursor value to begin next page

### Example Response

```json
{
  "_total": 8,
  "_cursor": "1454101643075611000",
  "posts": [{
    "id": "20",
    "created_at": "2016-01-29T21:07:23.075611Z",
    "deleted": false,
    "emotes": [ ],
    "reactions": {
      "endorse": {
        "count": 2,
        "user_ids": [ ]
      }
    },
    "body": "Kappa post",
    "user": {
      "display_name": "bangbangalang",
      "_id": 104447238,
      "name": "bangbangalang",
      "type": "user",
      "bio": "i like turtles and cats",
      "created_at": "2015-10-15T19:52:17Z",
      "updated_at": "2016-01-29T21:06:42Z",
      "logo": null,
      "_links": {
        "self": "https://api.twitch.tv/kraken/users/bangbangalang"
      }
    }
  }]
}
```

## putPost($channel, $options, $token = null)
*__Authenticated__*, required scope: `channel_feed_edit`

### Example Response

```json
{
  "post": {
    "id": "21",
    "created_at": "2016-01-29T21:07:23.075611Z",
    "deleted": false,
    "emotes": [ ],
    "reactions": {},
    "body": "New post",
    "user": {
      "display_name": "bangbangalang",
      "_id": 104447238,
      "name": "bangbangalang",
      "type": "user",
      "bio": "i like turtles and cats",
      "created_at": "2015-10-15T19:52:17Z",
      "updated_at": "2016-01-29T21:06:42Z",
      "logo": null,
      "_links": {
        "self": "https://api.twitch.tv/kraken/users/bangbangalang"
      }
    }
  },
  "tweet": "http://twitter.com/blah/status/23469487ruo4"
}
```

### post($channel, $post_id, $token = null)
*__Authenticated__*, optional scope: `channel_feed_read`

### Example Response

```json
{
  "id": "20",
  "created_at": "2016-01-29T21:07:23.075611Z",
  "deleted": false,
  "emotes": [ ],
  "reactions": {
    "endorse": {
      "count": 2,
      "user_ids": [104447238]
    }
  },
  "body": "Kappa post",
  "user": {
    "display_name": "bangbangalang",
    "_id": 104447238,
    "name": "bangbangalang",
    "type": "user",
    "bio": "i like turtles and cats",
    "created_at": "2015-10-15T19:52:17Z",
    "updated_at": "2016-01-29T21:06:42Z",
    "logo": null,
    "_links": {
      "self": "https://api.twitch.tv/kraken/users/bangbangalang"
    }
  }
}
```
### removePost($channel, $post_id, $token = null)
*__Authenticated__*, required scope: `channel_feed_edit`

## postPostReaction($channel, $post_id, $options , $token = null)
*__Authenticated__*, required scope: `channel_feed_edit`

| Name | Required? | Type | Description
| ---- | ---- | ---- | --------------- |
emote_id | required  | string | Single emote id (ex: "25" => Kappa) or the string "endorse"

##removePostReaction($channel, $post_id, $options , $token = null)
*__Authenticated__*, required scope: `channel_feed_edit`

| Name | Required? | Type | Description
| ---- | ---- | ---- | --------------- |
emote_id | required  | string | Single emote id (ex: "25" => Kappa) or the string "endorse"
