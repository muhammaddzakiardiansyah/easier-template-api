<?php

class Mahasiswa extends ES_Controller
{

  public function index()
  {
    http_response_code(404);
    echo json_encode([
      "statusCode" => 404,
      "message" => "url not found",
    ]);
    exit;
  }

  public function get_all_mahasiswa()
  {
    if($this->model("MahasiswaModel")->getAllMahasiswa()) {
      http_response_code(200);
      echo json_encode([
        "message" => "Success!",
        "statusCode" => 200,
        "data" => $this->model("MahasiswaModel")->getAllMahasiswa(),
      ]);
      exit;
    } else {
      http_response_code(400);
      echo json_encode([
        "message" => "Failed!",
        "statusCode" => 400,
        "error" => "error pokok e"
      ]);
      exit;
    }
  }

  public function get_detail_mahasiswa(string $id = "0")
  {
    $result = $this->model("MahasiswaModel")->getDetailMahasiswa($id);
    if($result !== []) {
      http_response_code(200);
      echo json_encode([
        "message" => "Success!",
        "statusCode" => 200,
        "data" => $result,
      ]);
      exit;
    } else {
      http_response_code(404);
      echo json_encode([
        "statusCode" => 404,
        "message" => "Data not found!",
      ]);
      exit;
    }
  }

  public function add_mahasiswa()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true) ?? [];

    if($data === []) {
      http_response_code(400);
      echo json_encode([
        "message" => "Error!",
        "error" => "Data not empty!",
      ]);
      exit;
    } else {
      if(
        Validate::field("name", $data["name"] ?? "") && 
        Validate::field("age", $data["age"] ?? "") &&
        Validate::field("nim", $data["nim"] ?? "")
        ) 
      {
        if($this->model("MahasiswaModel")->addMahasiswa($data) > 0) {
          http_response_code(201);
          echo json_encode([
            "message" => "Success created!",
            "statusCode" => 201,
          ]);
          exit;
        } else {
          http_response_code(400);
          echo json_encode([
            "message" => "Failed created!",
            "statusCode" => 400,
            "error" => "error pokok e"
          ]);
          exit;
        }
      }
    }
  }

  public function update_mahasiswa(string $id = "0")
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true) ?? [];

    if($data === []) {
      http_response_code(400);
      echo json_encode([
        "message" => "Error!",
        "error" => "Data not empty!",
      ]);
      exit;
    } else {
      if(
        Validate::field("name", $data["name"] ?? "") && 
        Validate::field("age", $data["age"] ?? "") &&
        Validate::field("nim", $data["nim"] ?? "")
        ) 
      {
        if($this->model("MahasiswaModel")->updateMahasiswa($data, $id) > 0) {
          http_response_code(200);
          echo json_encode([
            "message" => "Success updated!",
            "statusCode" => 200,
          ]);
          exit;
        } else {
          http_response_code(400);
          echo json_encode([
            "message" => "Failed updated!",
            "statusCode" => 400,
            "error" => "error pokok e"
          ]);
          exit;
        }
      }
    }
  }

  public function delete(string $id)
  {
    $result = $this->model("MahasiswaModel")->delete($id);
    if($result) {
      http_response_code(200);
      echo json_encode([
        "message" => "Success deleted!",
        "statusCode" => 200,
      ]);
      exit;
    } else {
      http_response_code(404);
      echo json_encode([
        "statusCode" => 404,
        "message" => "Data not found!",
      ]);
      exit;
    }
  }
}
