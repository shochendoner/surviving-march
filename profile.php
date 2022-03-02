<?php
  include_once 'header.php';

  $client = new http\Client;
  $request = new http\Client\Request;
  
  $request->setRequestUrl('https://api-basketball.p.rapidapi.com/games');
  $request->setRequestMethod('GET');
  $request->setQuery(new http\QueryString([
      'season' => '2021-2022',
      'league' => '116'
  ]));
  
  $request->setHeaders([
      'x-rapidapi-host' => 'api-basketball.p.rapidapi.com',
      'x-rapidapi-key' => '0346387995msh2c1248af75d544ep175845jsn782b1a09581f'
  ]);
  
  $client->enqueue($request)->send();
  $response = $client->getResponse();
  
  echo $response->getBody();
 ?> 