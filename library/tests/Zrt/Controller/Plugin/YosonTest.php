<?php

namespace Zrt\Tests\Controller\Plugin;

use Zrt_Controller_Plugin_Yoson,
    PHPUnit_Framework_TestCase,
    Mockery as m,
    Zend_Controller_Front,
    Zend_Controller_Request_Http,
    Zend_Controller_Response_Http;

class YosonTest extends PHPUnit_Framework_TestCase
{
    public $request;
    public $response;
    public $plugin;

    public function setUp()
    {
        Zend_Controller_Front::getInstance()->resetInstance();
        $this->request  = new Zend_Controller_Request_Http();
        $this->response = new Zend_Controller_Response_Http();
        $this->plugin   = new Zrt_Controller_Plugin_Yoson();

        $this->plugin->setRequest($this->request);
        $this->plugin->setResponse($this->response);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testOutputJsonWithoutApplicationConfig()
    {
        $request = m::mock('Zend_Controller_Request_Abstract');
        $request->shouldReceive('getModuleName')->times(3)->andReturn('Module');
        $request->shouldReceive('getControllerName')->times(3)->andReturn('Controller');
        $request->shouldReceive('getActionName')->times(3)->andReturn('Action');
        $this->plugin->postDispatch($request);
    }

}
