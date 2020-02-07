<?php

class Pages extends Controller{

	public function __construct(){
		
	}

	public function index(){

		$data = [
			'title' => 'Safe Notes',
			'description' => 'Here you can create notes and save them for whenever you need them. The upside is that they are always online! You will never not have your notes!'
		];

		$this->view("pages/index", $data);
	}

	public function about(){
		$data = [
			'title' => 'About Us',
			'description' => 'We tought it\'d be nice to make room for you outside yourhead and we made this, Enjoy!',
			'version' => Config::get('directory/version')
		];
		$this->view("pages/about", $data);
	}
}