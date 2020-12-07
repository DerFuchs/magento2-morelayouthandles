<?php
/**
 * Helper class for DerFuchs_MoreLayoutHandles Module
 *
 * @category  DerFuchs
 * @package   DerFuchs_MoreLayoutHandles
 * @author    Michael Fuchs - derfuchs
 * @copyright Copyright (c) 2020 Michael Fuchs - derfuchs - http://www.derfuchs.net
 * @license   MIT
 */

namespace DerFuchs\Morelayouthandles\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * Module's config path
     */
	const XML_PATH_MORELAYOUTHANDLES = 'dev/derfuchs_morelayouthandles/';

    // ------------------------------------------------------------------------------

    /**
     * Returns a config value from current store scope
     *
     * @param string    $field
     * @param integer   $storeId
     *
     * @return mixed
     */
	public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
		);
    }

    // ------------------------------------------------------------------------------

    /**
     * returns a config value from XML_PATH_MORELAYOUTHANDLES's config path
     *
     * @param string    $code
     * @param integer   $storeId
     *
     * @return void
     */
	public function getModuleConfigValue($code, $storeId = null)
	{
		return $this->getConfigValue(self::XML_PATH_MORELAYOUTHANDLES . $code, $storeId);
	}

    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
}
