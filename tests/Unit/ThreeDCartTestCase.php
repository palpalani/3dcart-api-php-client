<?php

namespace tests\Unit;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ThreeDCartTestCase
 *
 * @package tests\Unit
 */
class ThreeDCartTestCase extends TestCase
{
    /**
     * @param string $mock
     *
     * @return HttpClient
     */
    protected function createMockedHttpClient($mock)
    {
        $mock = new MockHandler([
            $this->createMockedResponse($mock),
        ]);

        return new HttpClient(['handler' => HandlerStack::create($mock)]);
    }

    /**
     * @param string $mock
     *
     * @return ResponseInterface
     */
    protected function createMockedResponse($mock)
    {
        $header = explode("\n", $this->loadMock($mock, 'header'));
        preg_match('#HTTP/1.1 (\d*) #', $header[0], $match);

        return new Response($match[1], $header, $this->loadMock($mock, 'response.xml'));
    }

    /**
     * loads mock from file system
     *
     * @param string $mock
     * @param string $part
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function loadMock($mock, $part)
    {
        $className = explode('\\', get_class($this));
        array_shift($className);
        unset($className[0]);
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'Mocks' . DIRECTORY_SEPARATOR . implode(
            DIRECTORY_SEPARATOR,
            $className
        ) . DIRECTORY_SEPARATOR . $mock . DIRECTORY_SEPARATOR . $part;
        if (! file_exists($path)) {
            throw new \Exception('Mock files are missing: ' . $mock . ' : ' . $part);
        }

        return file_get_contents($path);
    }

    /**
     * @return string
     */
    protected function getRootPath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
