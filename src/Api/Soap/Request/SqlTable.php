<?php

namespace ThreeDCart\Api\Soap\Request;

use ThreeDCart\Primitive\StringValueObject;

/**
 * Class SqlTable
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class SqlTable
{
    const TABLE_CATEGORY = 'category';
    const TABLE_CUSTOMERS = 'customers';
    const TABLE_PRODUCT_CATEGORY = 'product_category';
    const TABLE_ORDERS = 'orders';
    const TABLE_PO_PRODUCTS = 'PO_Products';
    const TABLE_WSI_WISHLISTITEMS = 'WSI_WishlistItems';
    const TABLE_ORDERS_LOG = 'orders_log';
    const TABLE_DISTRIBUTOR = 'distributor';
    const TABLE_PO_PRODUCTS_RECEIVED = 'PO_Products_Received';
    const TABLE_RECURRENT_OITEMS = 'recurrent_oitems';
    const TABLE_PO_STATUS = 'PO_Status';
    const TABLE_SHIPPINGERRORS = 'shippingerrors';
    const TABLE_CATEGORY_SORTING = 'category_sorting';
    const TABLE_ORDERS_CBA_LOG = 'orders_cba_log';
    const TABLE_WSH_WISHLIST = 'WSH_Wishlist';
    const TABLE_DISCOUNT_GROUP = 'discount_group';
    const TABLE_MANUFACTURER = 'manufacturer';
    const TABLE_ORDER_QUESTIONS = 'order_questions';
    const TABLE_PRODUCT_MAP = 'product_map';
    const TABLE_TRANSACTIONS = 'transactions';
    const TABLE_PAYMENT_EXCLUDELIST = 'payment_excludelist';
    const TABLE_PROMOTIONS_EXCLUDELIST = 'promotions_excludelist';
    const TABLE_REPORT_NEWSLETTER_EMAILS = 'report_newsletter_emails';
    const TABLE_PRODUCT_REVIEW = 'product_review';
    const TABLE_PRODUCT_IMAGES = 'product_images';
    const TABLE_BLOG_COMMENTS = 'blog_comments';
    const TABLE_PROMOTIONS = 'promotions';
    const TABLE_DATABASE_FEEDS = 'database_feeds';
    const TABLE_IP_SECURITY = 'ip_security';
    const TABLE_BLOG_CATXPOST = 'blog_catxpost';
    const TABLE_PRODUCTQA_QUESTION = 'productqa_question';
    const TABLE_PRODUCT_EMAILFRIEND = 'product_emailfriend';
    const TABLE_TEMPLATE = 'template';
    const TABLE_PRODUCT_RELATED = 'product_related';
    const TABLE_OFFLINE_PAYMENTS = 'offline_payments';
    const TABLE_BLOG_CATEGORIES = 'blog_categories';
    const TABLE_CATEGORY_FILTER = 'category_filter';
    const TABLE_TAX = 'tax';
    const TABLE_CUSTOMERS_PMNTPROFILES = 'customers_pmntprofiles';
    const TABLE_PRODUCTGA_ANSWER = 'productqa_answer';
    const TABLE_BLOG = 'blog';
    const TABLE_PRODUCT_DISTRIBUTOR = 'product_distributor';
    const TABLE_CUSTOMERS_LOG = 'customers_log';
    const TABLE_SERIALS = 'serials';
    const TABLE_PRODUCT_OFFERS = 'product_offers';
    const TABLE_AUTORESPONDER_RULES = 'autoresponder_rules';
    const TABLE_CUSTOMERS_CONTACT = 'customers_contact';
    const TABLE_INVENTORY_LOG = 'inventory_log';
    const TABLE_SEARCHS = 'searchs';
    const TABLE_ADMIN_MENU = 'admin_menu';
    const TABLE_PRODUCTQA_VOTE = 'productqa_vote';
    const TABLE_STORE_SETTINGS2 = 'store_settings2';
    const TABLE_PRODUCT_BOXES = 'product_boxes';
    const TABLE_GROUPDEAL_LOG = 'groupdeal_log';
    const TABLE_CUSTOMERS_ADDRESSBOOK = 'customers_addressbook';
    const TABLE_INSURANCE_RANGES = 'insurance_ranges';
    const TABLE_STORE_CLOSE_IP = 'store_close_ip';
    const TABLE_GROUPDEAL_EMAIL_LOG = 'groupdeal_email_log';
    const TABLE_ADMINPAGES = 'AdminPages';
    const TABLE_AUTORESPONDER_LOG = 'autoresponder_log';
    const TABLE_SQL_LOG = 'SQL_Log';
    const TABLE_ORDER_STATUS = 'order_Status';
    const TABLE_GIFT_CERTIFICATES_GROUPS = 'gift_certificates_groups';
    const TABLE_PRODFEATURES_RULES = 'prodfeatures_rules';
    const TABLE_PRODUCT_WAITINGLIST = 'product_waitinglist';
    const TABLE_PAGE_MAP = 'page_map';
    const TABLE_SERIALS_USED = 'serials_used';
    const TABLE_IMPORT_EXPORT_SET = 'import_export_set';
    const TABLE_DISTRIBUTOR_SHIPTOLIST = 'distributor_shiptolist';
    const TABLE_NEWSLETTER_GROUPS = 'newsletter_groups';
    const TABLE_ADMINPERMISSIONS = 'AdminPermissions';
    const TABLE_AUTORESPONDER_EMAILS = 'autoresponder_emails';
    const TABLE_PRODUCTS = 'products';
    const TABLE_ORDER_KOUNT_LOG = 'order_kount_log';
    const TABLE_GIFT_CERT_USES = 'gift_cert_uses';
    const TABLE_ORDER_FRAUD_LOG = 'order_fraud_log';
    const TABLE_CUSTOMER_REWARDS = 'customer_rewards';
    const TABLE_SHORTCUTS = 'shorcuts';
    const TABLE_AUTOEMAIL = 'autoemail';
    const TABLE_PRODFEATURES = 'prodfeatures';
    const TABLE_NEWSLETTERS = 'newsletters';
    const TABLE_NEWSLETTER = 'newsletter';
    const TABLE_SHIPFROM = 'shipfrom';
    const TABLE_RMASTATUS = 'RmaStatus';
    const TABLE_IMPORT_EXPORT_FIELDS = 'import_export_fields';
    const TABLE_PRODUCT_SHIPPING = 'product_shipping';
    const TABLE_RMAREASON = 'RmaReason';
    const TABLE_EMAILS = 'emails';
    const TABLE_API_SETTINGS_IP = 'api_settings_ip';
    const TABLE_OPTIONSTEMPLATE = 'optionstemplate';
    const TABLE_EPRODUCT_LOGINS = 'eproduct_logins';
    const TABLE_RMAMETHOD = 'RmaMethod';
    const TABLE_SHIPPING_ZIPS = 'shipping_zips';
    const TABLE_PROD_ADDFEATURES = 'prod_addfeatures';
    const TABLE_RMAHISTORY = 'RmaHistory';
    const TABLE_FILE_EDITOR = 'file_editor';
    const TABLE_IMPORT_EXPORT = 'import_export';
    const TABLE_API_SETTINGS = 'api_settings';
    const TABLE_RMA = 'RMA';
    const TABLE_CRM_MESSAGES = 'CRM_messages';
    const TABLE_PRICING = 'pricing';
    const TABLE_FEEDBACK_LOG = 'feedback_log';
    const TABLE_OPTIONS_ADVANCED = 'options_Advanced';
    const TABLE_ICART = 'icart';
    const TABLE_PRODUCT_REVIEW_VOTE = 'product_review_vote';
    const TABLE_AFP_AFFILIATESPAYMENTS = 'AFP_AffiliatesPayments';
    const TABLE_SHIPPING_STATES = 'shipping_states';
    const TABLE_CRM_DEPARTMENT = 'CRM_Department';
    const TABLE_HTML = 'HTML';
    const TABLE_SHIPPING = 'shipping';
    const TABLE_FEEDBACK_CATEGORIES = 'feedback_categories';
    const TABLE_AFP_AFFILIATES = 'AFF_Affiliates';
    const TABLE_SHIPPING_RANGES = 'shipping_ranges';
    const TABLE_EXTRAPAGES = 'extrapages';
    const TABLE_ONLINE_SHIPPING = 'online_shipping';
    const TABLE_CRM = 'CRM';
    const TABLE_PRICE_RANGE = 'price_range';
    const TABLE_MAIL_GROUPS = 'mail_groups';
    const TABLE_AMDINS = 'Admins';
    const TABLE_ONLINE_PAYMENTS = 'online_payments';
    const TABLE_PICKUPTYPE = 'PickupType';
    const TABLE_CREDITCARDS = 'creditcards';
    const TABLE_SHIPPING_OPTIONS = 'shipping_options';
    const TABLE_AUTORESPONDER_QUEUE = 'autoresponder_queue';
    const TABLE_REMINDERS_FREQUENCY = 'reminders_frequency';
    const TABLE_ORDER_DISCOUNTS = 'order_discounts';
    const TABLE_PAYMENT_METHODS = 'payment_methods';
    const TABLE_COMPANY_INFO = 'company_info';
    const TABLE_INVOICENUM = 'invoicenum';
    const TABLE_REMINDERS = 'reminders';
    const TABLE_PAYMENT_FIELDS = 'payment_fields';
    const TABLE_ERROR_MESSAGES = 'error_messages';
    const TABLE_NEWSLETTER_EMAILS = 'newsletter_emails';
    const TABLE_CHECKOUT_QUESTIONS = 'checkout_questions';
    const TABLE_RECURRENT_ORDERS = 'recurrent_orders';
    const TABLE_OITEMS_GIFTCERTIFICATES = 'oitems_giftcertificates';
    const TABLE_NEWSLETTER_BL = 'newsletter_bl';
    const TABLE_ERROR_LOG = 'error_log';
    const TABLE_PRODUCT_ACCESSORIES = 'product_accessories';
    const TABLE_SHIPPING_METHODS = 'shipping_methods';
    const TABLE_OITEMS = 'oitems';
    const TABLE_CBA_MAPPING = 'cba_mapping';
    const TABLE_EPRODUCT_SERIAL = 'eproduct_serial';
    const TABLE_CBA_ORDERSHIPPING = 'cba_ordershipping';
    const TABLE_FRAUD_RULE = 'fraud_rule';
    const TABLE_SHIPPING_EXCLUDELIST = 'shipping_excludelist';
    const TABLE_AUTORESPONDER_GROUPS = 'autoresponder_groups';
    const TABLE_OSL_ORDERSSHIPLABEL = 'OSL_OrdersShipLabel';
    const TABLE_MULTIPLE_STORES = 'multiple_stores';
    const TABLE_PRODUCTS_STOCK_LOG = 'product_stock_log';
    const TABLE_HANDLING_RANGES = 'handling_ranges';
    const TABLE_SHIPPING_COUNTRIES = 'shipping_countries';
    const TABLE_FRAUD_RULE_COND = 'fraud_rule_cond';
    const TABLE_ORDERS_SHIPMENTS = 'orders_shipments';
    const TABLE_FRAUD_RULE_ACTIONS = 'fraud_rule_actions';
    const TABLE_GIFT_CERTIFICATES = 'gift_certificates';
    const TABLE_FRAUD_RULE_TEXT = 'fraud_rule_text';
    const TABLE_MOBILE_LINKS = 'mobile_links';
    const TABLE_SITETEXT = 'sitetext';
    const TABLE_MENULINKS = 'menulinks';
    const TABLE_PRODFEATURES_OPTIONS = 'prodfeatures_options';
    const TABLE_GC_MAPPING = 'gc_mapping';
    const TABLE_CRM_STATUS = 'CRM_status';
    const TABLE_OFFLINE_PAYMENTS_FIELDS = 'offline_payments_fields';
    const TABLE_RMA_OITEM = 'RMA_oitem';
    const TABLE_RO_ORDERS = 'PO_Orders';
    
    /** @var StringValueObject */
    private $name;
    
    /**
     * @param StringValueObject $tableName
     */
    public function __construct(StringValueObject $tableName)
    {
        $this->name = $tableName;
    }
    
    /**
     * @return StringValueObject
     */
    public function getName()
    {
        return $this->name;
    }
}
