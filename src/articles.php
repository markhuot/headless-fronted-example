<?php

$blog = $app['controllers_factory'];
$blog->get('/articles/{slug}', function ($slug) use ($app) {

  // Fetch the JSON from our external service. Basic error checking for the
  // status code ensures we're looking at the right thing
  $response = $app['guzzle']->request('GET', 'https://api.github.com/repos/guzzle/guzzle?slug='.$slug);
  if ($response->getStatusCode() !== 200) {

  }

  // Everythign went well, get the JSON body
  $json = (string)$response->getBody();

  // Okay, we got some JSON back from a remote URL.
  // Now we could call something like Mustache::render() to display it to the page
  // For now I've just returned some placeholder.
  return 'This could be <code>{{ Mustache }}</code>, swapped out with the following json, <pre>'.$json;
});

return $blog;
