<?php

// Set router config
// ============================================================================
   // get && set relocation paths
   // -------------------------------------------------------------------------
      $rel = config('path', true)['reRoute'];
   // -------------------------------------------------------------------------

   // make a list of all the lines in relocated route to "/robots.txt"
   // -------------------------------------------------------------------------
      $lst = explode("\n", file_get_contents($rel['/robots.txt']));
   // -------------------------------------------------------------------------

   // walk through list
   // -------------------------------------------------------------------------
      forEach($lst as $itm)
      {
      // clean up item for string comparison
      // ----------------------------------------------------------------------
         $dny = trim($itm);
      // ----------------------------------------------------------------------

      // set deny to item that is "disallowed", else false
      // ----------------------------------------------------------------------
         if (substr($dny, 0, 9) === 'Disallow:')
         { $dny = trim(explode(':', $dny)[1]); }
         else
         { $dny = false; }
      // ----------------------------------------------------------------------

      // if item is "denied" add item to re-route list with target being dope
      // ----------------------------------------------------------------------
         if ($dny !== false)
         { $rel[$dny] = 'mod/spamdope.php'; }
      // ----------------------------------------------------------------------
      }
   // -------------------------------------------------------------------------

   // set config to updated relocation paths
   // -------------------------------------------------------------------------
      $GLOBALS['configuration']->path['reRoute'] = $rel;
   // -------------------------------------------------------------------------
// ============================================================================


// Re-route paths according to config
// ============================================================================
   function route($pth)
   {
   // get path config
   // -------------------------------------------------------------------------
      $rel = config('path', true)['reRoute'];
   // -------------------------------------------------------------------------

   // if given path is set to be re-routed, update path to the alternative
   // -------------------------------------------------------------------------
      if (isset($rel[$pth]))
      { $pth = $rel[$pth]; }
   // -------------------------------------------------------------------------

   // return updated path
   // -------------------------------------------------------------------------
      return $pth;
   // -------------------------------------------------------------------------
   }
// ----------------------------------------------------------------------------

?>