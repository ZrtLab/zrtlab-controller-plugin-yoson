<?php

class Zrt_Controller_Plugin_Yoson
    extends Zend_Controller_Plugin_Abstract
{

    protected $view;
    protected $yoson = array(
        'modulo' => '',
        'controller' => '',
        'action' => '',
        'min' =>  'min/',
        'AppCore' => array(),
        'AppSandbox' => array(),
        'AppSchema' => array(
            'module' => array(),
            'requires' => array(),
        )
    );

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->setupParams($request);

        if (PHP_SAPI != "cli") {
            $this->view = Zend_Layout::getMvcInstance()->getView();

            $this->view->HeadScript()->prependScript('var yOSON= ' .
                json_encode($this->yoson,JSON_FORCE_OBJECT)
            );
        }

        parent::postDispatch($request);
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getValuesYoson()
    {
        return $this->yoson;
    }

    protected function setupParams($request)
    {
        $this->yoson['modulo'] =  $request->getModuleName();
        $this->yoson['controller'] =  $request->getControllerName();
        $this->yoson['action'] =  $request->getActionName();
        //$yOSON['baseHost'] =  $this->config->app->siteUrl;
        //$yOSON['statHost'] =  $this->config->app->mediaUrl.'/';
        //$yOSON['eHost'] =  $this->config->app->elementsUrl;
        //$yOSON['statVers'] =  $this->lastCommit->getLastCommit();
    }

}
