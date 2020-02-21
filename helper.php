<?php defined('_JEXEC') or die;
/*
 * @package     mod_articles_custom
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\CMS\MVC\Model\BaseDatabaseModel;

JLoader::register('ContentHelperRoute', JPATH_SITE . '/components/com_content/helpers/route.php');

abstract class ModArticlesCustomHelper
{

	public static function getList(&$params)
	{
		BaseDatabaseModel::addIncludePath(JPATH_ROOT . '/components/com_content/models', 'ContentModel');
		$article = BaseDatabaseModel::getInstance('Article', 'ContentModel', array('ignore_request' => true));
		$article->setState('filter.published', 1);
		$article->setState('params', Factory::getApplication('site')->getParams());

		$items = [];
		$list = get_object_vars($params->get('fieldslist', []));

		if ($list) {
			foreach ($list as $listItem) {
				$id = $listItem->article;
				if ($id) {
					$article->setState('article.id', (int) $id);
					$a = $article->getItem();
					if ($a) {
						$a->link = Route::_(ContentHelperRoute::getArticleRoute($a->id . ':' . $a->alias, $a->catid, $a->language));
						$a->images = json_decode($a->images);
						$items[] = $a;
						unset($a);
					}
				}
			}
		}

		return $items;
	}
}
