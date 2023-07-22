<?php

class User
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function registerUser($name, $email, $password)
  {
    $this->db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':password', $password);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function loginUser($email, $password)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);
    if ($user = $this->db->single()) {
      $passwordMatch = password_verify($password, $user->password);
      if ($passwordMatch) {
        return $user;
      } else return false;
    }
  }
}
