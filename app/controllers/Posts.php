<?php

class Posts extends Controller
{
  private $postModel;
  public function __construct()
  {
    $this->postModel = $this->model('Post');
  }
  public function index()
  {
    $data = $this->postModel->getPosts();
    $this->view('posts/index', $data);
  }
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => ''
      ];
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter a title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter a body';
      } elseif (strlen($data['body']) < 10) {
        $data['body_err'] = 'Post must be at least 10 characters';
      }
      if (empty($data['title_err']) && empty($data['body_err'])) {
        session_start();
        if ($this->postModel->addPost($data['title'], $data['body'], $_SESSION['user_id'])) {
          redirect('posts/index');
        } else {
          die('Something went wrong');
        }
      } else {
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => '',
        'title_err' => '',
        'body_err' => ''
      ];
      $this->view('posts/add', $data);
    }
  }
}
