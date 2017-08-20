<?php

namespace ThreeDCart\Api\Rest\Service;

use ThreeDCart\Api\Rest\Filter\FilterListInterface;
use ThreeDCart\Api\Rest\Resource\Category;
use ThreeDCart\Api\Rest\Select\SelectListInterface;
use ThreeDCart\Api\Rest\Sort\SortInterface;

/**
 * @package ThreeDCart\Api\Rest\Request\Service
 */
class Categories extends AbstractService implements CategoriesInterface
{
    public function getCategories(
        SelectListInterface $selectList = null,
        FilterListInterface $filterList = null,
        SortInterface $sortOrderList = null
    ) {
        $rawResponse = $this->sendRequest($selectList, $filterList, $sortOrderList);
        
        return Category::fromList(json_decode($rawResponse->getStringValue(), true));
    }
}