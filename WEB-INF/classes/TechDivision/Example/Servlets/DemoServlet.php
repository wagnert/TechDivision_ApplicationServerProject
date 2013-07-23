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

use TechDivision\Example\Utilities\DemoTemplate;
use TechDivision\ServletContainer\Http\HttpResponse;
use TechDivision\ServletContainer\Http\HttpRequest;
use TechDivision\ServletContainer\Servlets\HttpServlet;

/**
 * @package     TechDivision\Example
 * @copyright   Copyright (c) 2013 <info@techdivision.com> - TechDivision GmbH
 * @license     http://opensource.org/licenses/osl-3.0.php
 *              Open Software License (OSL 3.0)
 * @author      Johann Zelger <j.zelger@techdivision.com>
 */

class DemoServlet extends HttpServlet
{
    /**
     * @param HttpRequest $req
     * @param HttpResponse $res
     * @throws \Exception
     */
    public function doGet($req, $res)
    {
        // build path to template
        $pathToTemplate = $this->getServletConfig()->getWebappPath()
            . DS . 'templates' . DS . 'layout.phtml';

        // init template
        $template = new DemoTemplate($pathToTemplate);

        // set vars in template
        $template->setRequestUri($req->getUri());
        $template->setUserAgent($req->getHeader("User-Agent"));
        $template->setWebappName($this->getServletConfig()->getApplication()->getName());

        // set response content by render template
        $res->setContent($template->render());
    }
}