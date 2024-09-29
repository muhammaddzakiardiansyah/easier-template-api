<?php

class HelloEasier {

  public function index()
  {
    $data = [
      "statusCode" => 200,
      "message" => "Hello Easier👋",
      "data" => [
        "message" => "Edit this endpoint in controller HelloEasier"
      ] 
    ];

    return Response::json($data, 200);
  }
  
}