<?php

/**
 * TechDivision\Example\Servlets\LoginServlet
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Application
 * @package    TechDivision_ApplicationServerProject
 * @subpackage Servlets
 * @author     Johann Zelger <jz@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_ApplicationServerWebsite
 */

namespace TechDivision\Example\Servlets;

use TechDivision\Http\HttpProtocol;
use TechDivision\Servlet\Http\HttpServlet;
use TechDivision\Servlet\Http\HttpServletRequest;
use TechDivision\Servlet\Http\HttpServletResponse;
use TechDivision\Example\Templates\DemoTemplate;

/**
 * Demo servlet handling GET requests.
 * 
 * @category   Application
 * @package    TechDivision_ApplicationServerWebsite
 * @subpackage Servlets
 * @author     Johann Zelger <jz@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_ApplicationServerWebsite
 */
class DemoServlet extends HttpServlet
{
    
    /**
     * Handles a Http GET request.
     * 
     * @param \TechDivision\Servlet\Http\ServletRequest  $servletRequest  The request instance
     * @param \TechDivision\Servlet\Http\ServletResponse $servletResponse The response instance
     *
     * @return void
     * @throws \TechDivision\Servlet\ServletException Is thrown if the request method is not implemented
     * @see \TechDivision\Servlet\Http\HttpServlet::doGet()
     */
    public function doGet(HttpServletRequest $servletRequest, HttpServletResponse $servletResponse)
    {
        // build path to template
        $pathToTemplate = $this->getServletConfig()->getWebappPath()
            . DIRECTORY_SEPARATOR . 'static' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layout.phtml';

        // init template
        $template = new DemoTemplate($pathToTemplate);

        $baseUrl = '/';
        // if the application has NOT been called over a VHost configuration append application folder naem
        if ($servletRequest->getContext()->isVhostOf($servletRequest->getServerName()) === false) {
            $baseUrl .= $servletRequest->getContext()->getName() . '/';
        }

        // set vars in template
        $template->setBaseUrl($baseUrl);
        $template->setRequestUri($servletRequest->getPathInfo());
        $template->setUserAgent($servletRequest->getHeader(HttpProtocol::HEADER_USER_AGENT));
        $template->setWebappName($servletRequest->getContext()->getName());

        // set response content by render template
        $servletResponse->appendBodyStream($template->render());
    }
}
