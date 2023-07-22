<?php

class Posts extends Controller
{
  private $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('Post');
  }
  public function index()
  {
    $data = $this->userModel->getPosts();
    $this->view('posts/index', $data);
  }
}
