<?php

/**
 * TechDivision\Example\Servlets\LoginServlet
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 */

namespace TechDivision\Example\Servlets;

use TechDivision\ServletContainer\Servlets\HttpServlet;

/**
 * @package     TechDivision\Example
 * @copyright  	Copyright (c) 2013 <info@techdivision.com> - TechDivision GmbH
 * @license    	http://opensource.org/licenses/osl-3.0.php
 *              Open Software License (OSL 3.0)
 * @author      Johann Zelger <j.zelger@techdivision.com>
 */

class DemoServlet extends HttpServlet
{

    public function getWebappName()
    {
        return $this->getServletConfig()->getApplication()->getName();
    }

    public function getBaseUrl()
    {
        return DS . $this->getWebappName() . DS;
    }

    public function doGet($req, $res)
    {

        // build path to template
        $pathToTemplate = $this->getServletConfig()->getWebappPath()
            . DS . 'templates' . DS . 'layout.phtml';

        // check if the template is available
        if (!file_exists($pathToTemplate)) {
            throw new \Exception("Requested template '$pathToTemplate' is not available");
        }

        // process the template
        ob_start();
        require_once $pathToTemplate;

        // set content to response
        $res->setContent(ob_get_clean());
    }
}