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

    public function doGet($req, $res)
    {
       $res->setContent($req->getUri());
    }

}