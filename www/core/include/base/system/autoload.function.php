<?php
/**
 * @package base
 * @version 0.4.0.0
 * @author Roman Konertz <konertz@open-lims.org>
 * @copyright (c) 2008-2011 by Roman Konertz
 * @license GPLv3
 * 
 * This file is part of Open-LIMS
 * Available at http://www.open-lims.org
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * version 3 of the License.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 * See the GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Autoload-Function
 * Loads required classes
 * @param string $classname
 */
function __autoload($classname)
{
	if ($GLOBALS['autoload_prefix'])
	{
		$path_prefix = $GLOBALS['autoload_prefix'];
	}
	else
	{
		$path_prefix = "";
	}
	
	// Environment
	$classes['DatetimeHandler']				= $path_prefix."core/include/base/environment/datetime_handler.class.php";
	$classes['Language']					= $path_prefix."core/include/base/environment/language.class.php";
	$classes['PaperSize']					= $path_prefix."core/include/base/environment/paper_size.class.php";
	$classes['Regional']					= $path_prefix."core/include/base/environment/regional.class.php";
	
	$classes['Environment_Wrapper']			= $path_prefix."core/include/base/environment/environment.wrapper.class.php";
	
	
	// Security
	$classes['AuthForgotPasswordSendFailedException']	= $path_prefix."core/include/base/security/exceptions/auth_forgot_password_send_failed_exception.class.php";
	$classes['AuthUserNotFoundException']				= $path_prefix."core/include/base/security/exceptions/auth_user_not_found_exception.class.php";
	
	$classes['Auth'] 						= $path_prefix."core/include/base/security/auth.class.php";
	
	
	// System
	$classes['EventListenerInterface']		= $path_prefix."core/include/base/system/interfaces/event_listener.interface.php"; 
	
	$classes['BaseException']				= $path_prefix."core/include/base/system/exceptions/base.exception.class.php";
	$classes['BasePHPErrorException']		= $path_prefix."core/include/base/system/exceptions/base_php_error.exception.class.php";
	
	$classes['Convert']				= $path_prefix."core/include/base/system/convert.class.php";
	$classes['ErrorLanguage']				= $path_prefix."core/include/base/system/error_language.class.php";
	$classes['EventHandler']				= $path_prefix."core/include/base/system/event_handler.class.php";
	$classes['ExceptionHandler']			= $path_prefix."core/include/base/system/exception_handler.class.php";
	$classes['System']						= $path_prefix."core/include/base/system/system.class.php";
	$classes['Mail']						= $path_prefix."core/include/base/mail.class.php";	
	$classes['ModuleDialog']				= $path_prefix."core/include/base/system/module_dialog.class.php";
	$classes['ModuleLink']					= $path_prefix."core/include/base/system/module_link.class.php";
	$classes['ModuleNavigation']			= $path_prefix."core/include/base/system/module_navigation.class.php";
	$classes['Retrace']						= $path_prefix."core/include/base/system/retrace.class.php";
	
	$classes['System_Wrapper']				= $path_prefix."core/include/base/system/system.wrapper.class.php";
	
	
	// System Frontend
	$classes['SystemLogException']				= $path_prefix."core/include/base/system_fe/exceptions/system_log.exception.class.php";
	$classes['SystemLogNotFoundException']		= $path_prefix."core/include/base/system_fe/exceptions/system_log_not_found.exception.class.php";
	$classes['SystemLogIDMissingException']		= $path_prefix."core/include/base/system_fe/exceptions/system_log_id_missing.exception.class.php";
	$classes['SystemMessageException']			= $path_prefix."core/include/base/system_fe/exceptions/system_message.exception.class.php";
	$classes['SystemMessageNotFoundException']	= $path_prefix."core/include/base/system_fe/exceptions/system_message_not_found.exception.class.php";
	$classes['SystemMessageIDMissingException']	= $path_prefix."core/include/base/system_fe/exceptions/system_message_id_missing.exception.class.php";
	
	$classes['SystemLog']					= $path_prefix."core/include/base/system_fe/system_log.class.php";
	$classes['SystemMessage']				= $path_prefix."core/include/base/system_fe/system_message.class.php";
	
	$classes['SystemFE_Wrapper']			= $path_prefix."core/include/base/system_fe/system_fe.wrapper.class.php";
	
	
	// User
	$classes['UserException']				= $path_prefix."core/include/base/user/exceptions/user.exception.class.php";
	$classes['UserNotFoundException']		= $path_prefix."core/include/base/user/exceptions/user_not_found.exception.class.php";
	$classes['UserIDMissingException']		= $path_prefix."core/include/base/user/exceptions/user_id_missing.exception.class.php";
	$classes['UserDeleteException']			= $path_prefix."core/include/base/user/exceptions/user_delete.exception.class.php";
	
	$classes['GroupException']				= $path_prefix."core/include/base/user/exceptions/group.exception.php";
	$classes['GroupNotFoundException']		= $path_prefix."core/include/base/user/exceptions/group_not_found.exception.php";
	$classes['GroupIDMissingException']		= $path_prefix."core/include/base/user/exceptions/group_id_missing.exception.php";
	
	$classes['User'] 						= $path_prefix."core/include/base/user/user.class.php";
	$classes['Group'] 						= $path_prefix."core/include/base/user/group.class.php";
	
	$classes['User_Wrapper'] 				= $path_prefix."core/include/base/user/user.wrapper.class.php";
	
	
	$registered_include_array = SystemHandler::get_include_folders();
	if (is_array($registered_include_array) and count($registered_include_array) >= 1)
	{
		foreach($registered_include_array as $key => $value)
		{
			$config_file = constant("INCLUDE_DIR")."/".$value."/config/include_info.php";
			if (file_exists($config_file))
			{
				include($config_file);
				if ($no_class_path != true)
				{
					$class_path_file = constant("INCLUDE_DIR")."/".$value."/config/class_path.php";
					include($class_path_file);
				}
				unset($no_class_path);
			}
		}
	}
	
	if (isset($classes[$classname])) {
		require_once($classes[$classname]);
	}
	
}

?>