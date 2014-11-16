<?php

// Produce output from PHP
// ----------------------------------------------------------------------------
   function render($dfn, $import=null)
   {
      $rsl = null;

      if ((is_path($dfn)) && (file_exists($dfn)))
      {
         $ext = pathinfo($dfn, PATHINFO_EXTENSION);

         if ($ext === 'php')
         {
            ob_start();
               require($dfn);
            $rsl = ob_get_clean();
         }
      }

      return $rsl;
   }
// ----------------------------------------------------------------------------
