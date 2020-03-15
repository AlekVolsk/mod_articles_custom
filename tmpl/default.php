<?php defined('_JEXEC') or die;
/*
 * @package     mod_articles_custom
 * @copyright   Copyright (C) Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>
<div class="mod_articles_custom <?php echo $moduleclass_sfx; ?>">
	<ul>
		<?php foreach ($list as $item) { ?>
		<li>
			<h3><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
		</li>
		<?php } ?>
	</ul>
</div>
