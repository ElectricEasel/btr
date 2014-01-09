<?php

$app = JFactory::getApplication();
$menu = $app->getMenu();
// Get item tree for items that have a menutype of 'resources'
$menu_items = $menu->getItems('menutype', 'resources');
$active = $menu->getActive();
$child_items = null;
foreach($menu_items as $item)
{
	// Find the item whose title matches the current page's menu title. That's who we want.
	if($item->title == $active->title)
	{
		// Get item tree for items that have a parent_id of current $item->id. This $item's children.
		$child_items = $menu->getItems('parent_id', $item->id);
	}
	if($child_items)
	{
		break;
	}
}
if($child_items)
{
	echo '<ul class="nav">';
	foreach($child_items as $item)
	{
		$class = null;
		if($class = $item->params->get('menu-anchor_css'))
		{
			$class = " class='{$class}'";
		}
		echo "<li><a{$class} href='{$item->link}'>{$item->title}</a></li>";
	}
	echo '</ul>';
}