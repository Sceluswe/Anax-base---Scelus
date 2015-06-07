<?php

function get_substr($string, $first, $last)
{
	$firstEncounter = false;
	$lastEncounter = false;
	
	$result = "";
	
	for($i = 0; $i < strlen($string); $i++)
	{
		if($string[$i] == $first && !$firstEncounter)
		{
			$firstEncounter = true;
		}
		else if($string[$i] == $last && $firstEncounter && !$lastEncounter)
		{
			$lastEncounter = true;
		}
		
		if($firstEncounter && $string[$i] != $first && !$lastEncounter)
		{
			$result .= $string[$i];
		}
	}
	
	return $result;
}


function getCurrentUrl() 
{
  $url = "http";
  $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
  $url .= "://";
  $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
    (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
  $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
  return $url;
}

function isAuthenticated()
{
	// Check if user is authenticated.
	$acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

	if($acronym) 
	{
		$output = true;
	}
	else 
	{
		$output = false;
	}
	
	return $output;
}

/**
 * 
 *
 * Function for easily creating a form.
 *  Just specify attributes in an array and decide if you want a legend or not.
 */
function get_form($form, $method=null, $action=null, $legend=null)
{
	$html = "";
	if((isset($method) && !empty($method) && !is_null($method)) || (isset($action) && !empty($action) && !is_null($action)))
	{
		$html .= "<form";
		if($method == 'get' || $method == 'post')
		{
			$html .= " method='" . $method . "'";
		}
		
		if(isset($action) && !empty($action) && !is_null($action))
		{
			$html .= " action='{$action}'";
		}
		$html .= ">";
		
		
		if(isset($legend))
		{
			$html .= "<fieldset><legend>{$legend}</legend>";
		}
		
		foreach($form as $item)
		{
			if($item['type'] == 'textarea')
			{
				if(isset($item['type']))
				{
					if(array_key_exists('label', $item))
					{
						if(isset($item['label']))
						{
							$html .= "<label>{$item['label']}<br/>";
						}
					}
					$html .= "<textarea rows='3' name='{$item['name']}'>";
					
					if(array_key_exists('value', $item))
					{
						if(isset($item['value']))
						{
							$html .= "{$item['value']}";
						}
					}
					
					$html .="</textarea>";
						
					if(array_key_exists('label', $item))
					{
						if(isset($item['label']))
						{
							$html .= "</label>";
						}
					}
				}
			}
			else if(array_key_exists('type', $item) && array_key_exists('name', $item))
			{
				if(isset($item['type']) && isset($item['name']))
				{
					$html .= "<p>";
					if(array_key_exists('label', $item))
					{
						if(isset($item['label']))
						{
							$html .= "<label>{$item['label']}<br/>";
						}
					}
					
					$html .= "<input type='{$item['type']}' name='{$item['name']}'";
					
					if(array_key_exists('value', $item))
					{
						$html .= "value='{$item['value']}'/>";
					}
					else
					{
						$html .= "/>";
					}
					
					if(array_key_exists('label', $item))
					{
						if(isset($item['label']))
						{
							$html .= "</label>";
						}
					}
					
					$html .= "</p>";
				}
			}
			else if(array_key_exists('type', $item) && !array_key_exists('name', $item))
			{
				$html .= "<p>";
				if(array_key_exists('label', $item))
				{
					if(isset($item['label']))
					{
						$html .= "<label>{$item['label']}<br/>";
					}
				}
				
				$html .= "<input type='{$item['type']}'";
				
				if(array_key_exists('value', $item))
				{
					$html .= "value='{$item['value']}'/>";
				}
				else
				{
					$html .= "/>";
				}
				
				if(array_key_exists('label', $item))
				{
					if(isset($item['label']))
					{
						$html .= "</label>";
					}
				}
				
				$html .= "</p>";
			}
		}
		
		if(isset($legend))
		{
			$html .= "</fieldset>";
		}
		
		$html .= "</form>";
	}
	else
	{
		$html .= "Invalid form, method or otherwise.";
	}
	
	return $html;
}