<?php

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Core\HTTPResponseContainer;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractController {
	/**
	 * @var ServerRequestInterface
	 */
	protected $request;
	/**
	 * @var HTTPResponseContainer
	 */
	protected $responseContainer;

	/**
	 * @param ServerRequestInterface $request
	 * @param HTTPResponseContainer  $responseContainer
	 */
	public function __construct(ServerRequestInterface $request, HTTPResponseContainer $responseContainer) {
		$this->request           = $request;
		$this->responseContainer = $responseContainer;
	}
}