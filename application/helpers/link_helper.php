<?php

if ( ! function_exists('link_is_active'))
{
	function link_is_active($url){
		if($url == "" || $url == null){
			return ((explode(base_url(), current_url()))[1] == $url)? "active" : "";
		} else {
			return (str_contains((explode(base_url(), current_url()))[1], $url))? "active" : "";
		}
	}
}
