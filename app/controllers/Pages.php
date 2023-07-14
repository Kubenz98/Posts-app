<?php

class Pages extends Controller
{
  public function index()
  {
    $data = ['title' => 'Posts App',];

    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = ['title' => 'About Us'];
    $this->view('pages/about', $data);
  }
}
