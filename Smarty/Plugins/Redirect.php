<?php
/*************************************************************************************/
/* This file is part of the Thelia package.                                          */
/*                                                                                   */
/* Copyright (c) OpenStudio                                                          */
/* email : dev@thelia.net                                                            */
/* web : http://www.thelia.net                                                       */
/*                                                                                   */
/* For the full copyright and license information, please view the LICENSE.txt       */
/* file that was distributed with this source code.                                  */
/*************************************************************************************/

namespace SmartyRedirection\Smarty\Plugins;

use Thelia\Core\HttpKernel\Exception\RedirectException;
use TheliaSmarty\Template\AbstractSmartyPlugin;
use TheliaSmarty\Template\Plugins\UrlGenerator;
use TheliaSmarty\Template\SmartyPluginDescriptor;

/**
 * Class Redirect
 * @package SmartyRedirection\Smarty\Plugins
 * @author Benjamin Perche <bperche9@gmail.com>
 */
class Redirect extends AbstractSmartyPlugin
{
    const DEFAULT_REDIRECTION_STATUS = 302;
    /**
     * @var UrlGenerator
     */
    protected $urlGeneratorPlugin;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGeneratorPlugin = $urlGenerator;
    }

    /**
     * @param $params
     */
    public function throwRedirect($params)
    {
        $status = static::DEFAULT_REDIRECTION_STATUS;

        if (isset($params["status"])) {
            $status = (int) $params["status"];
            unset ($params["status"]);
        }

        throw new RedirectException($this->urlGeneratorPlugin->generateUrlFunction($params, $foo), $status);
    }

    /**
     * @return array of SmartyPluginDescriptor
     */
    public function getPluginDescriptors()
    {
        return array(
            new SmartyPluginDescriptor("function", "redirect", $this, "throwRedirect"),
        );
    }
}
