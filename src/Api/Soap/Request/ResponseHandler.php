<?php

namespace ThreeDCart\Api\Soap\Request;

use ThreeDCart\Api\Soap\Request\Xml\SimpleXmlExceptionRenderer;
use ThreeDCart\Api\Soap\Response\Xml;
use ThreeDCart\Primitive\ArrayValueObject;
use ThreeDCart\Primitive\StringValueObject;

/**
 * Class ResponseHandler
 *
 * @package ThreeDCart\Api\Soap\Request
 */
class ResponseHandler implements ResponseHandlerInterface
{
    const XML_RESPONSE_ERROR = 'Error';
    const XML_RESPONSE_ID = 'Id';
    const XML_RESPONSE_DESCRIPTION = 'Description';
    
    /** @var SimpleXmlExceptionRenderer */
    private $simpleXmlExceptionRenderer;
    
    /**
     * @param SimpleXmlExceptionRenderer $simpleXmlExceptionRenderer
     */
    public function __construct(SimpleXmlExceptionRenderer $simpleXmlExceptionRenderer)
    {
        $this->simpleXmlExceptionRenderer = $simpleXmlExceptionRenderer;
    }
    
    /**
     * @param Xml $xml
     *
     * @return ArrayValueObject
     */
    public function convertToArray(Xml $xml)
    {
        $simpleXML = $this->convertResponseIntoSimpleXMLElement($xml);
        
        return $this->XMLToArray($simpleXML);
    }
    
    /**
     * @param \SimpleXMLElement $xml
     *
     * @return ArrayValueObject
     */
    protected function XMLToArray(\SimpleXMLElement $xml)
    {
        $resultArray = json_decode(json_encode((array)$xml));
        
        return new ArrayValueObject((array)$this->convertEmptyStdClassToNull($resultArray));
    }
    
    /**
     * @param array|\stdClass $object
     *
     * @return mixed
     */
    protected function convertEmptyStdClassToNull($object)
    {
        if ($object instanceof \stdClass && count((array)$object) == 0) {
            return null;
        } elseif (is_object($object) || is_array($object)) {
            foreach ($object as $key => &$value) {
                $value = $this->convertEmptyStdClassToNull($value);
            }
            
            return (array)$object;
        }
        
        return $object;
    }
    
    /**
     * @param Xml $xml
     *
     * @return \SimpleXMLElement
     *
     * @throws MalFormedApiResponseException
     */
    protected function convertResponseIntoSimpleXMLElement(Xml $xml)
    {
        try {
            libxml_use_internal_errors(true);
            libxml_clear_errors();
            $simpleXML = new \SimpleXMLElement($xml->getXmlAsString()->getStringValue(), LIBXML_NOCDATA);
            
            return $simpleXML;
        } catch (\Exception $ex) {
            throw new MalFormedApiResponseException(
                $this->simpleXmlExceptionRenderer->getErrorMessage($this->getLibXMLErrors())
            );
        }
    }
    
    /**
     * @return array
     */
    protected function getLibXMLErrors()
    {
        $libXMLErrors = libxml_get_errors();
        libxml_clear_errors();
        
        return $libXMLErrors;
    }
    
    /**
     * @param Xml              $xmlResponse
     * @param ArrayValueObject $response
     *
     * @throws ApiErrorException
     */
    public function handleApiErrors(Xml $xmlResponse, ArrayValueObject $response)
    {
        if (
            $response->issetKey(new StringValueObject(self::XML_RESPONSE_ID))
            && $response->issetKey(new StringValueObject(self::XML_RESPONSE_DESCRIPTION))
        ) {
            throw new ApiErrorException(
                $response->getStringValueObject(new StringValueObject(self::XML_RESPONSE_DESCRIPTION))->getStringValue(),
                $response->getStringValueObject(new StringValueObject(self::XML_RESPONSE_ID))->getStringValue()
            );
        }
        
        if ($response->issetKey(new StringValueObject(self::XML_RESPONSE_ERROR))) {
            $errorResponse = $response->getArrayValueObject(new StringValueObject(self::XML_RESPONSE_ERROR));
            if (
                $errorResponse->issetKey(new StringValueObject(self::XML_RESPONSE_ID))
                && $errorResponse->issetKey(new StringValueObject(self::XML_RESPONSE_DESCRIPTION))
            ) {
                throw new ApiErrorException(
                    $errorResponse->getStringValueObject(
                        new StringValueObject(self::XML_RESPONSE_DESCRIPTION)
                    )->getStringValue(),
                    $errorResponse->getStringValueObject(
                        new StringValueObject(self::XML_RESPONSE_ID)
                    )->getStringValue()
                );
            }
        }
        
        if (strpos($xmlResponse->getXmlAsString()->getStringValue(), '<' . self::XML_RESPONSE_ERROR) === 0) {
            throw new ApiErrorException(substr($xmlResponse->getXmlAsString()->getStringValue(), 0, 500), null);
        }
    }
}
