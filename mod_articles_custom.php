<?php defined('_JEXEC') or die;
/*
 * @package     mod_articles_custom
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Helper\ModuleHelper;

JLoader::register('ModArticlesCustomHelper', __DIR__ . '/helper.php');

$cacheparams = new stdClass;
$cacheparams->cachemode = 'safeuri';
$cacheparams->class = 'ModArticlesCustomHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = ['id' => 'int', 'Itemid' => 'int'];

$list = ModuleHelper::moduleCache($module, $params, $cacheparams);

if (!count($list)) return;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require ModuleHelper::getLayoutPath('mod_articles_custom', $params->get('layout', 'default'));
