<?php

    class Admin extends Controller
    {
        public function __construct()
        {
            if (!isLoggedIn())
            {
                redirect('users/login');
            }

            // $this->adminModel = $this->model('Admin');
            // $this->userModel = $this->model('User');
        }

        public function index()
        {
            // Get Posts
            // $posts = $this->postModel->getPosts();

            $data = [];

            $this->view('admin/index', $data);
        }
    }