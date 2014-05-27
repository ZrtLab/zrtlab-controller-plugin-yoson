<?php

class Zrt_Controller_Plugin_Yoson
    extends Zend_Controller_Plugin_Abstract
{

    public function postDispatch(Zend_Controller_Request_Abstract $request)
    {
        $view = Zend_Layout::getMvcInstance()->getView();
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


        $view->HeadScript()->prependScript('var yOSON= ' .
            json_encode($yOSON,JSON_FORCE_OBJECT)
        );
        parent::postDispatch($request);
    }

}
