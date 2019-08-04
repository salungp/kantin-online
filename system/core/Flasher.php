<?php
class Flasher
{
	public static function setFlash($msg = null)
	{
		$_SESSION['flasher'] = array('msg' => $msg);
	}

	public static function getFlash()
	{
		if (isset($_SESSION['flasher']))
		{
			echo $_SESSION['flasher']['msg'];
			unset($_SESSION['flasher']);
		}
	}
}