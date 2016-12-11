<?php

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Core\HTTPResponseContainer;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractController {
	/**
	 * @var ServerRequestInterface
	 */
	private $request;
	/**
	 * @var HTTPResponseContainer
	 */
	private $responseContainer;

	/**
	 * @param ServerRequestInterface $request
	 * @param HTTPResponseContainer  $responseContainer
	 */
	public function __construct(ServerRequestInterface $request, HTTPResponseContainer $responseContainer) {
		$this->request           = $request;
		$this->responseContainer = $responseContainer;
	}

    /**
     * @return ServerRequestInterface
     */
    protected function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    /**
     * @param ServerRequestInterface $request
     */
    protected function setRequest(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return HTTPResponseContainer
     */
    protected function getResponseContainer(): HTTPResponseContainer
    {
        return $this->responseContainer;
    }

    /**
     * @param HTTPResponseContainer $responseContainer
     */
    protected function setResponseContainer(HTTPResponseContainer $responseContainer)
    {
        $this->responseContainer = $responseContainer;
    }
}