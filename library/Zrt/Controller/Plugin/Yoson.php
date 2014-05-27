<?php

class Zrt_Controller_Plugin_Yoson
    extends Zend_Controller_Plugin_Abstract
{

    protected $view;
    protected $value;

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->setupParams();
        $this->view = Zend_Layout::getMvcInstance()->getView();

        $this->view->HeadScript()->prependScript('var yOSON= ' .
            json_encode($this->value,JSON_FORCE_OBJECT)
        );
        parent::postDispatch($request);
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function getValue()
    {
        return $this->value;
    }

    protected function setupParams()
    {
        $yOSON = array();
        $yOSON['modulo'] =  $request->getModuleName();
        $yOSON['controller'] =  $request->getControllerName();
        $yOSON['action'] =  $request->getActionName();
        //$yOSON['baseHost'] =  $this->config->app->siteUrl;
        //$yOSON['statHost'] =  $this->config->app->mediaUrl.'/';
        //$yOSON['eHost'] =  $this->config->app->elementsUrl;
        //$yOSON['statVers'] =  $this->lastCommit->getLastCommit();
        $yOSON['min'] =  'min/';
        $yOSON['AppCore'] = array();
        $yOSON['AppSandbox'] = array();
        $yOSON['AppSchema'] = array(
                        'module' => array(),
                        'requires' => array(),
                        );

        $this->value = $yOSON;
    }

}
