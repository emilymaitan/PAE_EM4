<?php

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\API\iApiConnector;
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
     * @var iApiConnector
     */
	private $apiConnector;

	/**
	 * @param ServerRequestInterface $request
	 * @param HTTPResponseContainer  $responseContainer
     * @param iApiConnector          $apiConnector
	 */
	public function __construct(ServerRequestInterface $request, HTTPResponseContainer $responseContainer, iApiConnector $apiConnector) {
		$this->request           = $request;
		$this->responseContainer = $responseContainer;
		$this->apiConnector      = $apiConnector;
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

    /**
     * @return iApiConnector
     */
    public function getApiConnector(): iApiConnector
    {
        return $this->apiConnector;
    }

    /**
     * @param iApiConnector $apiConnector
     */
    public function setApiConnector(iApiConnector $apiConnector)
    {
        $this->apiConnector = $apiConnector;
    }
}