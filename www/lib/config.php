<?php

	$GLOBALS['configuration'] = new Object();

   function config($nme, $bln=false)
   {
		if (!property_exists($GLOBALS['configuration'], $nme))
		{
			$pth = 'cfg/'.$nme.'.json';

			if (file_exists($pth))
			{ $GLOBALS['configuration']->$nme = json_decode(file_get_contents($pth), true); }
			else
			{ $GLOBALS['configuration']->$nme = 'undefined'; }
		}

		$rsl = $GLOBALS['configuration']->$nme;

		if ($rsl !== 'undefined')
		{
			if ($bln === false)
			{ $rsl = (object) $rsl; }
		}

		return $rsl;
   }

?>
