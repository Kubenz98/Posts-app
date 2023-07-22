<?php

class Post
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getPosts()
  {
    $this->db->query('SELECT posts.id, posts.title, posts.body, posts.date, users.name
      FROM posts
      JOIN users
      ON posts.user_id = users.id;
       ');
    return $this->db->resultSet();
  }
  public function addPost($title, $body, $user_id)
  {
    $this->db->query('INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :user_id)');
    $this->db->bind('title', $title);
    $this->db->bind('body', $body);
    $this->db->bind('user_id', $user_id, PDO::PARAM_INT);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}