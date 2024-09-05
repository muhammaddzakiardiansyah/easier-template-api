<?php

class MahasiswaModel {
  private string $table = "mahasiswa";
  private object $db;

  public function __construct()
  {
    $this->db = new ES_Connection();
  }

  public function getAllMahasiswa()
  {
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->resultAll();
  }

  public function getDetailMahasiswa(string $id)
  {
    $this->db->query("SELECT * FROM $this->table WHERE id = :id LIMIT 1");
    $this->db->bind("id", $id);

    if($this->db->single()) {
      return $this->db->single();
    } else {
      return [];
    }
  }

  public function addMahasiswa(array $data)
  {
    $name = htmlspecialchars($data["name"]);
    $age = htmlspecialchars($data["age"]);
    $nim = htmlspecialchars($data["nim"]);

    $query = "INSERT INTO $this->table (name, age, nim) VALUES (:name, :age, :nim)";

    $this->db->query($query);
    $this->db->bind("name", $name);
    $this->db->bind("age", $age);
    $this->db->bind("nim", $nim);

    return $this->db->rowCount();
  }

  public function updateMahasiswa(array $data, string $id)
  {
    $name = htmlspecialchars($data["name"]);
    $age = htmlspecialchars($data["age"]);
    $nim = htmlspecialchars($data["nim"]);

    $query = "UPDATE $this->table SET name = :name, age = :age, nim = :nim WHERE id = :id";

    $this->db->query($query);
    $this->db->bind("name", $name);
    $this->db->bind("age", $age);
    $this->db->bind("nim", $nim);
    $this->db->bind("id", $id);

    return $this->db->rowCount();
  }

  public function delete(string $id)
  {
    $this->db->query("DELETE FROM $this->table WHERE id = :id");
    $this->db->bind("id", $id);

    if($this->db->rowCount()) {
      return true;
    } else {
      return false;
    }
  }
}