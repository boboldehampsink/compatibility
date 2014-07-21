<?php
namespace Craft;

class CompatibilityPlugin extends BasePlugin
{
    function getName()
    {
        return Craft::t('Browser Compatibility');
    }

    function getVersion()
    {
        return '1.0.1';
    }

    function getDeveloper()
    {
        return 'Bob Olde Hampsink';
    }

    function getDeveloperUrl()
    {
        return 'http://www.itmundi.nl';
    }
    
    function init() {
    
        if(craft()->request->isCpRequest()) {
                        
            // Check if IE7 - 9
            if(preg_match('/(?i)msie [7-9]/',$_SERVER['HTTP_USER_AGENT'])) {
            
                // Extend History API
                craft()->templates->includeFootHtml('<script type="text/javascript" src="'.UrlHelper::getResourceUrl('compatibility/js/native.history.js').'"></script>');
                craft()->templates->includeFootHtml('<script type="text/javascript">var history = History;</script>');
            
                // CSS fixes
                craft()->templates->includeCssResource('compatibility/css/style.css');
                
            }
            
        }
        
    }
}