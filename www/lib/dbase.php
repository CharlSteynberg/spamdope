<?php

// Set dbase config
// ============================================================================
   config('dbase');
// ============================================================================


// Run SQL queries & return result as "object" or "assoc array"
// ============================================================================
   function dbase($nme, $bln=false)
   {
      $rsl = new Object(array(
         "_dbNme"=>$nme,
         "runSQL"=>function($self, $sql)
         {
            $sql = trim($sql);
            $cfg = config('dbase');
            $dbc = mysql_connect($cfg->hst, $cfg->usr, $cfg->pwd);
            $dbn = mysql_select_db($self->_dbNme);

            $qry = mysql_query($sql);

            if (substr($sql, 0, 6) == 'select')
            {
               $len = mysql_num_fields($qry);
               $rtn = array();
               $nms = array();

               for ($i=0; $i<$len; $i++)
               {
                  $fnm = mysql_field_name($qry, $i);
                  $nms[$i] = $fnm;
                  $rtn[$fnm] = array();
               }

               while($cpa = mysql_fetch_row($qry))
               {
                  forEach($cpa as $key => $val)
                  {
                     $rtn[$nms[$key]][] = $val;
                  }
               }

               $rtn = (object) $rtn;
            }
            else
            {
               $rtn = $qry;
            }

            $dbc = mysql_close($dbc);

            return $rtn;
         }
      ));

      return $rsl;
   }
// ============================================================================



?>
