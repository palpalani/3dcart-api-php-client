<?php

namespace ThreeDCart\Api\Rest\Service;

use ThreeDCart\Api\Rest\Filter\FilterListInterface;
use ThreeDCart\Api\Rest\Request\ApiPathAppendix;
use ThreeDCart\Api\Rest\Request\HttpMethod;
use ThreeDCart\Api\Rest\Request\HttpParameter;
use ThreeDCart\Api\Rest\Request\HttpParameterList;
use ThreeDCart\Api\Rest\Request\RequestInterface;
use ThreeDCart\Api\Rest\Select\SelectListInterface;
use ThreeDCart\Api\Rest\Sort\SortInterface;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class AbstractService
 *
 * @package ThreeDCart\Api\Rest\Request\Service
 */
class AbstractService
{
    /** @var RequestInterface */
    protected $requestClient;
    
    /**
     * @param RequestInterface $requestClient
     */
    public function __construct(
        RequestInterface $requestClient
    ) {
        $this->requestClient = $requestClient;
    }
    
    /**
     * @param SelectListInterface $selectList
     * @param FilterListInterface $filterList
     * @param SortInterface       $sortOrderList
     *
     * @return HttpParameterList
     */
    protected function generateRequestParameter(
        SelectListInterface $selectList = null,
        FilterListInterface $filterList = null,
        SortInterface $sortOrderList = null
    ) {
        $requestParameterList =
            ! is_null($filterList) ? $filterList->getHttpParameterList() : new HttpParameterList();
        
        if ($sortOrderList !== null && ! $sortOrderList->isEmpty()->getBoolValue()) {
            $requestParameterList->addParameter(
                new HttpParameter(
                    new StringValueObject('$orderby'),
                    $sortOrderList->getQueryString()
                )
            );
        }
        
        if ($selectList !== null && ! $selectList->isEmpty()->getBoolValue()) {
            $requestParameterList->addParameter(
                new HttpParameter(
                    new StringValueObject('$select'),
                    $selectList->getQueryString()
                )
            );
        }
        
        return $requestParameterList;
    }
    
    /**
     * @param SelectListInterface $selectList
     * @param FilterListInterface $filterList
     * @param SortInterface       $sortOrderList
     *
     * @return StringValueObject
     */
    protected function sendRequest(
        SelectListInterface $selectList = null,
        FilterListInterface $filterList = null,
        SortInterface $sortOrderList = null
    ) {
        $requestParameterList = $this->generateRequestParameter($selectList, $filterList, $sortOrderList);
        
        $rawResponse = $this->requestClient->send(
            new HttpMethod(HttpMethod::HTTP_METHOD_GET),
            new ApiPathAppendix(''),
            $requestParameterList,
            new HttpParameterList()
        );
        
        return $rawResponse;
    }
}
