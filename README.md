# laravel5-twitch-api
Laravel 5, Twitch Api v3.  
See official documentation [Twitch restful api link](https://github.com/justintv/Twitch-API)

適用於 Laravel 5 的 v3 版 API (2016.05.06)    
查看官方文件 [Twitch restful api link](https://github.com/justintv/Twitch-API/tree/master/v3_resources)

2016.05.06 - 新增 Twitch post 功能。  

# Installation 安裝

將 package 加入 ```composer.json```  
Require the package in composer.json : 
```bash
"maras0830/laravel5-twitch-api": "dev-master"
```
在 ``config/app.php``` 加入 providers  
In ```config/app.php``` add ```providers```
```php
Maras0830\TwitchApi\Providers\ApiServiceProvider::class
```
In ```config/app.php``` add ```aliases```  
```php
'TwitchApi'             => Maras0830\TwitchApi\Facades\ApiServiceFacade::class,
```
發行設定  
Publish the config
```php
php artisan vendor:publish --force
```
創建一個 twitch 的名稱於```config/twitch-api.php``` ，並且根據 twitch 上所開的應用程式進行設定  
Create a twitch application ( in your twitch settings page, Connections tab )
Create a client secret
Add both client secret, client id to the twitch-api.php config

Change the scopes that the application needs to better suit your needs

# Usage 使用

[Blocks.md](https://github.com/Maras0830/laravel5-twitch-api/blob/master/doc/Blocks.md)  
[Channel Feed.md](https://github.com/Maras0830/laravel5-twitch-api/blob/master/doc/Channel_Feed.md)  

Waiting ...
待補..

##  Authentication 認證說明

Twitch api uses [OAuth 2.0 protocol] for authentication.  
Twitch api 使用 [OAuth 2.0 protocol] 認證。  

you need to sign up application with your domain on Twitch and you will get client_id & client_secret and can set up redirect_url.  
您必須先在 Twitch 註冊一個專屬於這個域名的應用程式，接著將會得到 ```client_id``` and ```client_secret``` 並且建立 ```redirect_url```。  
    
[OAuth 2.0 protocol]:http://hueniverse.com/2010/05/introducing-oauth-2-0
