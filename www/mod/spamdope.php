<?php

   function dopeList()
   {
      $ttl = explode(' ', 'Contacts Forum Guestbook Comments Journal Friends Family Colleagues Accounts Attendees');
      $pts = explode(' ', 'names_frst names_last spamr_doms');
      $rtn = rand(2, 6);
      $lst = array();
      $rsl = '';

      shuffle($ttl);

      for($i=0; $i<$rtn; $i++)
      {
         $rsl .= '<a href="'.strtolower($ttl[$i]).'.html"><h2 style="margin-bottom:1px">'.$ttl[$i].'</h2></a>';
         $mrr = rand(4, 15);

         $qry = '
                  select id, val
                  from [tblName], (select id AS sid from [tblName] ORDER BY RAND() LIMIT '.$mrr.') tmp
                  where id = tmp.sid
                ';

         forEach($pts as $prt)
         {
            $cpq = str_replace('[tblName]', $prt, $qry);
            $cpr = dbase('spamdope')->runSQL($cpq);

            $lst[$prt] = array();

            forEach($cpr->val as $key => $cpa)
            {
               $lst[$prt][] = $cpa;
            }
         }

         forEach($lst['names_frst'] as $key => $val)
         {
            $fnm = $lst['names_frst'][$key];
            $lnm = $lst['names_last'][$key];
            $dmn = $lst['spamr_doms'][$key];
            $eml = strtolower($fnm).strtolower(substr($lnm, 0, 1)).'@'.$dmn;

            $rsl .= $fnm.' '.$lnm.' <a href="mailto:'.$eml.'">'.$eml.'</a><br>';
         }
      }

      return $rsl;
   }

   $styles = explode(' ', 'screen tags classes');
      $tmpOut = '';
      forEach($styles as $itm)
      {
         $tmpOut .= '<style id="'.$itm.'">'."\n";
         $tmpOut .= file_get_contents('css/'.$itm.'.css')."\n";
         $tmpOut .= '</style>'."\n\n";
      }
   $styles = $tmpOut;

   $spmImg = base64_encode(file_get_contents('img/tuck_in.jpg'));

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>tuck in</title>
      <?= $styles; ?>
   </head>
   <body style="overflow:auto">
      <center>
         <table style="background:#2d2f31; box-shadow:0px 0px 0.5em #000; border-collapse:collapse">
            <tr>
               <td valign="top">
                  <img src="data:image/jpeg;base64,<?= $spmImg ?>" style="margin-top:1em" />
               </td>
               <td style="background:#36383a; padding:1em">
                  <?= dopeList() ?>
               </td>
            </tr>
         </table>
      </center>
   </body>
</html>
