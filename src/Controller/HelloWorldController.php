<?php

namespace emilymaitan\PAE_EM4\Controller;

class HelloWorldController extends AbstractController {
	public function helloWorld() {
		return [
			'message' => 'Hello world!',
		];
	}
}