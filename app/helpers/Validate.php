<?php

class Validate {
  /**
   * @var $field_name for field name like "name"
   * @var $filed_value for value like "dzaki"
  */
  public static function field($field_name, $filed_value)
  {
    if(!isset($filed_value) || trim($filed_value) == "") {
      http_response_code(400);
      echo json_encode([
        "message" => "Error!",
        "error" => "Field '$field_name' is required!",
      ]);
    } else {
      return true;
    }
  }
}