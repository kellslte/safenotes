<?php

//Simple redirect class

/**
 *
 */
class Redirect{
	public static function to($location){
	    header('location: '. Config::get('directory/urlroot'). '/'. $location);
	}
}