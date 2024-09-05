<?php

class HelloEasier {
  public function index()
  {
    http_response_code(200);
    echo json_encode([
      "statusCode" => 200,
      "message" => "Hello Easier👋",
    ]);
  }
}