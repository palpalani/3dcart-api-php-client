<?php

namespace tests\Unit\Api\Soap\Xml;

use tests\Unit\ThreeDCartTestCase;
use ThreeDCart\Api\Soap\Request\Xml\SimpleXmlExceptionRenderer;

/**
 * Class SimpleXmlExceptionRendererTest
 *
 * @package tests\Unit\Api\Soap\Xml
 */
class SimpleXmlExceptionRendererTest extends ThreeDCartTestCase
{
    /** @var SimpleXmlExceptionRenderer */
    public $subjectUnderTest;
    
    public function setUp()
    {
        $this->subjectUnderTest = new SimpleXmlExceptionRenderer();
    }
    
    public function testParseLibXMLErrors()
    {
        libxml_use_internal_errors(true);
        libxml_clear_errors();
        
        $messages = '';

        try {
            new \SimpleXMLElement("<?xml version='1.0'><broken><xml></broken>");
        } catch (\Exception $ex) {
            $messages = $this->subjectUnderTest->getErrorMessage(libxml_get_errors());
        }
        
        $testMessages = explode("\n", $messages);
        
        $this->assertCount(4, $testMessages);
        $this->assertEquals(defined('PHP_WINDOWS_VERSION_MAJOR')
            ? 'Fatal Error 65: Blank needed here on line 1 in column 20'
            : 'Fatal Error 65: Blank needed here on line 1 in column 19', $testMessages[0]);
        $this->assertEquals(
            defined('PHP_WINDOWS_VERSION_MAJOR')
            ? 'Fatal Error 57: parsing XML declaration: \'?>\' expected on line 1 in column 20'
            : 'Fatal Error 57: parsing XML declaration: \'?>\' expected on line 1 in column 19',
            $testMessages[1]
        );
        $this->assertEquals(
            defined('PHP_WINDOWS_VERSION_MAJOR')
                ? 'Fatal Error 76: Opening and ending tag mismatch: xml line 1 and broken on line 1 in column 43'
                : 'Fatal Error 76: Opening and ending tag mismatch: xml line 1 and broken on line 1 in column 42',
            $testMessages[2]
        );
        $this->assertEquals(
            defined('PHP_WINDOWS_VERSION_MAJOR')
                ? 'Fatal Error 77: Premature end of data in tag broken line 1 on line 1 in column 43'
                : 'Fatal Error 77: Premature end of data in tag broken line 1 on line 1 in column 42',
            $testMessages[3]
        );
    }
    
    public function testParseLibXMLWarning()
    {
        $messages = $this->subjectUnderTest->getErrorMessage([
            $this->createLibXMLError(LIBXML_ERR_WARNING, 11, 12, 'test', 13),
        ]);
        
        $testMessages = explode("\n", $messages);
        
        $this->assertCount(1, $testMessages);
        $this->assertEquals($testMessages[0], 'Warning 11: test on line 13 in column 12');
    }
    
    public function testParseLibXMLError()
    {
        $messages = $this->subjectUnderTest->getErrorMessage([
            $this->createLibXMLError(LIBXML_ERR_ERROR, 14, 15, 'test', 16),
        ]);
        
        $testMessages = explode("\n", $messages);
        
        $this->assertCount(1, $testMessages);
        $this->assertEquals($testMessages[0], 'Error 14: test on line 16 in column 15');
    }
    
    public function testParseLibXMLFatalError()
    {
        $messages = $this->subjectUnderTest->getErrorMessage([
            $this->createLibXMLError(LIBXML_ERR_FATAL, 14, 15, 'test', 16),
        ]);
        
        $testMessages = explode("\n", $messages);
        
        $this->assertCount(1, $testMessages);
        $this->assertEquals($testMessages[0], 'Fatal Error 14: test on line 16 in column 15');
    }
    
    public function testErrorLevelNotAnInt()
    {
        $messages = $this->subjectUnderTest->getErrorMessage([
            $this->createLibXMLError('wrong datatype', 14, 15, 'test', 16),
        ]);
        
        $testMessages = explode("\n", $messages);
        
        $this->assertCount(1, $testMessages);
        $this->assertEquals($testMessages[0], ' 14: test on line 16 in column 15');
    }
    
    /**
     * @param int    $level
     * @param int    $code
     * @param int    $column
     * @param string $message
     * @param int    $line
     * @param string $file
     *
     * @return \LibXMLError
     */
    private function createLibXMLError($level, $code, $column, $message, $line, $file = '')
    {
        $libXMLError = new \LibXMLError();
        $libXMLError->level = $level;
        $libXMLError->code = $code;
        $libXMLError->column = $column;
        $libXMLError->message = $message;
        $libXMLError->file = $file;
        $libXMLError->line = $line;
        
        return $libXMLError;
    }
}
