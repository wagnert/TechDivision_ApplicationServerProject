<?php

/**
 * TechDivision\Example\Templates\AbstractTemplate
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

/**
 * Abstract demo template.
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
class AbstractTemplate
{

    /**
     * Path to template file
     *
     * @var string
     */
    protected $templateFilepath;

    /**
     * Constructor
     *
     * @param string $templateFilepath The path to the template file
     */
    public function __construct($templateFilepath = null)
    {
        $this->setTemplateFilepath($templateFilepath);
    }

    /**
     * Sets template filepath
     *
     * @param $templateFilepath
     * @throws \Exception
     * @returns AbstractTemplate
     */
    public function setTemplateFilepath($templateFilepath)
    {
        // check if the template is available
        if (!file_exists($templateFilepath)) {
            throw new \Exception("Requested template '$templateFilepath' is not available");
        }
        // set template file path
        $this->templateFilepath = $templateFilepath;

        return $this;
    }

    /**
     * Returns the path to the template file to render
     *
     * @return string
     */
    public function getTemplateFilepath()
    {
        return $this->templateFilepath;
    }

    /**
     * Renders the given template
     *
     * @return string
     */
    public function render()
    {
        // turn on output buffering
        ob_start();
        // render template file via php
        require $this->templateFilepath;
        // return rendered content
        return ob_get_clean();
    }
}
