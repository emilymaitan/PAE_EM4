<?php

namespace emilymaitan\PAE_EM4\Controller;

class ErrorController extends AbstractController {
	public function error(\Exception $exception) {
		return [
			'exception' => $exception
		];
	}

	public function notFound() {
		return [
		];
	}

	public function methodNotAllowed($allowedMethods) {
		return [
			'allowedMethods' => $allowedMethods
		];
	}
}