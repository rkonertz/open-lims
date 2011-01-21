<?php
/**
 * @package project
 * @version 0.4.0.0
 * @author Roman Konertz
 * @copyright (c) 2008-2010 by Roman Konertz
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
 * Project Log Interface
 * @package project
 */ 	
interface ProjectLogInterface
{
	function __construct($log_id);
	function __destruct();
	
	public function create($project_id, $content, $cancel, $important, $action_checksum);
	public function delete();
	public function link_status($status_id);
	public function get_status_id();
	public function get_datetime();
	public function get_content();
	public function get_cancel();
	public function get_important();
	public function get_owner_id();
	public function set_content($content);
	public function set_important($important);
	public function list_items();
	
	public static function list_entries_by_project_id($project_id);
}
?>
