<?php

namespace ThreeDCart\Api\Rest\Field;

class Category extends AbstractField
{
    const CATEGORYID = "CategoryID";
    const CATEGORYNAME = "CategoryName";
    const LINK = "Link";
    const CATEGORYDESCRIPTION = "CategoryDescription";
    const CATEGORYICON = "CategoryIcon";
    const CATEGORYMAIN = "CategoryMain";
    const CATEGORYPARENT = "CategoryParent";
    const SORTING = "Sorting";
    const HIDE = "Hide";
    const USERID = "UserID";
    const LASTUPDATE = "LastUpdate";
    const CATEGORYMENUGROUP = "CategoryMenuGroup";
    const HOMESPECIALCATEGORY = "HomeSpecialCategory";
    const FILTERCATEGORY = "FilterCategory";
    const TEMPLATECATEGORYPAGE = "TemplateCategoryPage";
    const DEFAULTPRODUCTSSORTING = "DefaultProductsSorting";
    const SUBCATEGORYCOLUMNSCATEGORYSPECIALS = "SubcategoryColumnsCategorySpecials";
    const PRODUCTCOLUMNSCATEGORYSPECIALS = "ProductColumnsCategorySpecials";
    const PRODUCTCOLUMNSCATEGORYGENERALITEMS = "ProductColumnsCategoryGeneralItems";
    const ITEMSPERPAGECATEGORYSPECIALITEMS = "ItemsPerPageCategorySpecialItems";
    const ITEMSPERPAGECATEGORYGENERALITEMS = "ItemsPerPageCategoryGeneralItems";
    const DISPLAYTYPECATEGORYSPECIALITEMS = "DisplayTypeCategorySpecialItems";
    const DISPLAYTYPECATEGORYGENERALPRODUCTS = "DisplayTypeCategoryGeneralProducts";
    const ALLOWACCESS = "AllowAccess";
    const ONFAILREDIRECTTO = "OnFailRedirectTo";
    const HIDELEFTBAR = "HideLeftBar";
    const HIDERIGHTBAR = "HideRightBar";
    const HIDETOPMENU = "HideTopMenu";
    const SMARTCATEGORIES = "SmartCategories";
    const SMARTCATEGORIESSEARCHKEYWORD = "SmartCategoriesSearchKeyword";
    const SMARTCATEGORIESLINKTARGET = "SmartCategoriesLinkTarget";
    const TEMPLATEPRODUCTPAGE = "TemplateProductPage";
    const PRODUCTCOLUMNSRELATEDPRODUCTS = "ProductColumnsRelatedProducts";
    const PRODUCTCOLUMNSUPSELLPRODUCTS = "ProductColumnsUpsellProducts";
    const DISPLAYTYPERELATEDITEMS = "DisplayTypeRelatedItems";
    const DISPLAYTYPEUPSELLITEMS = "DisplayTypeUpsellItems";
    const OPTIONSETLIST = "OptionSetList";
    const TITLE = "Title";
    const CUSTOMFILENAME = "CustomFileName";
    const METATAGS = "MetaTags";
    const CATEGORYHEADER = "CategoryHeader";
    const CATEGORYFOOTER = "CategoryFooter";
    const ADDITIONALKEYWORDS = "AdditionalKeywords";
    
    public static $allowedValues = [
        self::CATEGORYID,
        self::CATEGORYNAME,
        self::LINK,
        self::CATEGORYDESCRIPTION,
        self::CATEGORYICON,
        self::CATEGORYMAIN,
        self::CATEGORYPARENT,
        self::SORTING,
        self::HIDE,
        self::USERID,
        self::LASTUPDATE,
        self::CATEGORYMENUGROUP,
        self::HOMESPECIALCATEGORY,
        self::FILTERCATEGORY,
        self::TEMPLATECATEGORYPAGE,
        self::DEFAULTPRODUCTSSORTING,
        self::SUBCATEGORYCOLUMNSCATEGORYSPECIALS,
        self::PRODUCTCOLUMNSCATEGORYSPECIALS,
        self::PRODUCTCOLUMNSCATEGORYGENERALITEMS,
        self::ITEMSPERPAGECATEGORYSPECIALITEMS,
        self::ITEMSPERPAGECATEGORYGENERALITEMS,
        self::DISPLAYTYPECATEGORYSPECIALITEMS,
        self::DISPLAYTYPECATEGORYGENERALPRODUCTS,
        self::ALLOWACCESS,
        self::ONFAILREDIRECTTO,
        self::HIDELEFTBAR,
        self::HIDERIGHTBAR,
        self::HIDETOPMENU,
        self::SMARTCATEGORIES,
        self::SMARTCATEGORIESSEARCHKEYWORD,
        self::SMARTCATEGORIESLINKTARGET,
        self::TEMPLATEPRODUCTPAGE,
        self::PRODUCTCOLUMNSRELATEDPRODUCTS,
        self::PRODUCTCOLUMNSUPSELLPRODUCTS,
        self::DISPLAYTYPERELATEDITEMS,
        self::DISPLAYTYPEUPSELLITEMS,
        self::OPTIONSETLIST,
        self::TITLE,
        self::CUSTOMFILENAME,
        self::METATAGS,
        self::CATEGORYHEADER,
        self::CATEGORYFOOTER,
        self::ADDITIONALKEYWORDS,
    ];
}
