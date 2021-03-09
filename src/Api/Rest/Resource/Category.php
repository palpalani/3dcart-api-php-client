<?php

namespace ThreeDCart\Api\Rest\Resource;

use ThreeDCart\Api\Rest\Resource\Category\OptionSet;

/**
 * @package ThreeDCart\Api\Rest\Resource
 *
 * @method static Category fromArray(array $properties)
 * @method static Category[] fromList(array $list)
 */
class Category extends AbstractResource
{
    protected static $lists = [
        'OptionSetList' => OptionSet::class,
    ];
    
    /** @var int */
    public $CategoryID;
    
    /** @var string */
    public $CategoryName;
    
    /** @var string */
    public $Link;
    
    /** @var string */
    public $CategoryDescription;
    
    /** @var string */
    public $CategoryIcon;
    
    /** @var bool */
    public $CategoryMain;
    
    /** @var int */
    public $CategoryParent;
    
    /** @var int */
    public $Sorting;
    
    /** @var bool */
    public $Hide;
    
    /** @var string */
    public $UserID;
    
    /** @var string */
    public $LastUpdate;
    
    /** @var int */
    public $CategoryMenuGroup;
    
    /** @var bool */
    public $HomeSpecialCategory;
    
    /** @var bool */
    public $FilterCategory;
    
    /** @var int */
    public $TemplateCategoryPage;
    
    /** @var int */
    public $DefaultProductsSorting;
    
    /** @var int */
    public $SubcategoryColumnsCategorySpecials;
    
    /** @var int */
    public $ProductColumnsCategorySpecials;
    
    /** @var int */
    public $ProductColumnsCategoryGeneralItems;
    
    /** @var int */
    public $ItemsPerPageCategorySpecialItems;
    
    /** @var int */
    public $ItemsPerPageCategoryGeneralItems;
    
    /** @var int */
    public $DisplayTypeCategorySpecialItems;
    
    /** @var int */
    public $DisplayTypeCategoryGeneralProducts;
    
    /** @var string */
    public $AllowAccess;
    
    /** @var string */
    public $OnFailRedirectTo;
    
    /** @var bool */
    public $HideLeftBar;
    
    /** @var bool */
    public $HideRightBar;
    
    /** @var bool */
    public $HideTopMenu;
    
    /** @var int */
    public $SmartCategories;
    
    /** @var string */
    public $SmartCategoriesSearchKeyword;
    
    /** @var string */
    public $SmartCategoriesLinkTarget;
    
    /** @var int */
    public $TemplateProductPage;
    
    /** @var int */
    public $ProductColumnsRelatedProducts;
    
    /** @var int */
    public $ProductColumnsUpsellProducts;
    
    /** @var int */
    public $DisplayTypeRelatedItems;
    
    /** @var int */
    public $DisplayTypeUpsellItems;
    
    /** @var OptionSet[] */
    public $OptionSetList;
    
    /** @var string */
    public $Title;
    
    /** @var string */
    public $CustomFileName;
    
    /** @var string */
    public $MetaTags;
    
    /** @var string */
    public $CategoryHeader;
    
    /** @var string */
    public $CategoryFooter;
    
    /** @var string */
    public $AdditionalKeywords;
}
