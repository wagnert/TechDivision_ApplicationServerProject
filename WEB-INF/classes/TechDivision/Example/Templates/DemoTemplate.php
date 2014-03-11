<?php

/**
 * TechDivision\Example\Templates\DemoTemplate
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
 * @package    TechDivision_ApplicationServerWebsite
 * @subpackage Templates
 * @author     Johann Zelger <jz@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_ApplicationServerWebsite
 */

namespace TechDivision\Example\Templates;

use TechDivision\Example\Templates\AbstractTemplate;

/**
 * Demo template.
 * 
 * @category   Application
 * @package    TechDivision_ApplicationServerWebsite
 * @subpackage Templates
 * @author     Johann Zelger <jz@techdivision.com>
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_ApplicationServerWebsite
 */
class DemoTemplate extends AbstractTemplate
{

    /**
     * Some properties for template
     *
     * @var string
     */
    protected $webappName;
    protected $requestUri;
    protected $userAgent;
    protected $baseUrl;

    /**
     * @param mixed $requestUri
     */
    public function setRequestUri($requestUri)
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @return mixed
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param mixed $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $webappName
     */
    public function setWebappName($webappName)
    {
        $this->webappName = $webappName;
    }

    /**
     * @return string
     */
    public function getWebappName()
    {
        return $this->webappName;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
}
