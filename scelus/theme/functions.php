<?php

function dump($array) 
{
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}

/**
 * Create a slug of a string, to be used as url.
 *
 * @param string $str the string to format as slug.
 * @returns str the formatted slug. 
 */
function slugify($str) 
{
	$str = mb_strtolower(trim($str));
	$str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
	$str = preg_replace('/[^a-z0-9-]/', '-', $str);
	$str = trim(preg_replace('/-+/', '-', $str), '-');
	return $str;
}

/**
 * Create a link to the content, based on its type.
 *
 * @param object $content to link to.
 * @return string with url to display content.
 */
function getUrlToContent($content) {
  switch($content->type) {
    case 'page': return "page.php?url={$content->url}"; break;
    case 'post': return "blog.php?slug={$content->slug}"; break;
    default: return null; break;
  }
}

/**
 * Theme related functions. 
 *
 */
 
/**
 * Get title for the webpage by concatenating page specific title with site-wide title.
 *
 * @param string $title for this page.
 * @return string/null wether the favicon is defined or not.
 */
function get_title($title) 
{
  global $scelus;
  return $title . (isset($scelus['title_append']) ? $scelus['title_append'] : null);
}

/**
 * 
 *
 * Function for creating a dynamic navigationbar. 
 * 
 */
function get_navbar($menu) 
{
	$html = "<nav class='navbar'>\n";
	foreach($menu['items'] as $item) 
	{
		if(basename($_SERVER['SCRIPT_FILENAME']) == $item['url'])
		{
			$item['class'] .= ' selected'; 
		}
		$html .= "<p><a href='{$item['url']}' class='{$item['class']}'>{$item['text']}</a>\n</p>";
	}
	$html .= "</nav>";
	return $html;
}

/**
 * 
 *
 * Function for creating a dynamic loginbar. 
 * 
 */
function get_loginbar($menu)
{
	$html = "<nav class='loginbar'>";
	foreach($menu['items'] as $item)
	{
		if(basename($_SERVER['SCRIPT_FILENAME']) == $item['url'])
		{
			$item['class'] .= ' selected'; 
		}
		
		if(!isset($_SESSION['user']) && $item['url'] == 'logout.php')
		{
		}
		else if(isset($item['url']))
		{
			$html .= "<a href='{$item['url']}' class='{$item['class']}'>{$item['text']}</a>";
		}
	}
	$html .= "</nav>";
	return $html;
}

