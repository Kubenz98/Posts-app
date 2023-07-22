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
}
