<?php

// TOOLS LIBRARY :: for cleaner and shorter code
// ----------------------------------------------------------------------------
   require('lib/tools.php');
// ----------------------------------------------------------------------------


// CONFIG OBJECT :: to load / add configuration and re-use as needed
// ----------------------------------------------------------------------------
   require('lib/config.php');
// ----------------------------------------------------------------------------


// ROUTER MODULE :: to re-route paths
// ----------------------------------------------------------------------------
   require('lib/router.php');
// ----------------------------------------------------------------------------


// DATA MODULE :: for database IO (use ORM module instead - if needed)
// ----------------------------------------------------------------------------
   require('lib/dbase.php');
// ----------------------------------------------------------------------------


// DATA MODULE :: for database IO (use ORM module instead - if needed)
// ----------------------------------------------------------------------------
   require('lib/render.php');
// ----------------------------------------------------------------------------


// SERVE FUNCTION :: Serve response according to request
// ----------------------------------------------------------------------------
   function serve($req)
   {
      $sts = 200;
      $msg = 'OK';
      $tpe = 'text/plain';
      $pth = route($req);

      if (is_path($pth))
      {
         if (!file_exists($pth))
         {
            $sts = 404;
            $msg = 'Not Found';
         }
         else
         {
            $ext = pathinfo($pth, PATHINFO_EXTENSION);
            $qry = 'select tpe from mimeTypes where ext="'.$ext.'" limit 1';
            $tpe = dbase('fileInfo')->runSQL($qry)->tpe[0];
         }
      }
      else
      {
         echo print_r($req); // serve anything else
         return;
      }

      header('HTTP/1.0 '.$sts.' '.$msg);
      header('Content-type: '.$tpe);

      if ($sts === 200)
      {
         if ($ext === 'php')
         {
            $rsp = render($pth);
            $len = strlen($rsp);
         }
         else
         { $len = filesize($pth); }

         header('Content-Length: '.$len);

         if ($ext === 'php')
         { echo $rsp; }
         else
         { readfile($pth); }
      }
   }
// ----------------------------------------------------------------------------


// SERVE REQUEST
// ----------------------------------------------------------------------------
   serve($_SERVER['REQUEST_URI']);
// ----------------------------------------------------------------------------

?>
