<?php

namespace ThreeDCart\Api\Soap\Request\Xml;

/**
 * Class SimpleXmlExceptionRenderer
 *
 * @package ThreeDCart\Api\Soap\Request\Xml
 */
class SimpleXmlExceptionRenderer
{
    /**
     * @param array $libXmlErrors
     *
     * @return string
     */
    public function getErrorMessage(array $libXmlErrors)
    {
        $messages = [];
        foreach ($libXmlErrors as $libXmlError) {
            $messages[] = $this->getErrorLevelName($libXmlError->level) . ' ' . $libXmlError->code . ': '
                . str_replace("\n", '', $libXmlError->message) . ' on line ' . $libXmlError->line . ' in column '
                . $libXmlError->column;
        }
        
        return implode("\n", $messages);
    }
    
    /**
     * @param int $errorLevel
     *
     * @return string
     */
    private function getErrorLevelName($errorLevel)
    {
        if (! is_int($errorLevel)) {
            return '';
        }
        switch ($errorLevel) {
            case LIBXML_ERR_WARNING:
                return 'Warning';

                break;
            case LIBXML_ERR_FATAL:
                return 'Fatal Error';

                break;
            default:
            case LIBXML_ERR_ERROR:
                return 'Error';

                break;
        }
    }
}
