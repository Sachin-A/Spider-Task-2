<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "twitterusername";
$notweets = 30;
$consumerkey = "El4EQQvAj5TEsLhBCuiiEMYZY";
$consumersecret = "Qm97BGxzZfJNZwQco4PhQ6UQca4ifCi34cES1RYXn39hzJdvBW";
$accesstoken = "3254763462-0O4UyIy89e2K8LBfKFpis5Aw6evgDrPj9nAhVJu";
$accesstokensecret = "uvZV3V8We1u7IuMvi9mXUCQwC1WNW6FfoYfNCYA8VTqaU";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>
