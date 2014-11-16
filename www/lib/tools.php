<?php

   function get_status($nbr)
   {
      return config('stat')[$nbr.''];
   }

   function is_path($dfn)
   {
      $tpe = gettype($dfn);

      if (($tpe === 'string') && (preg_match('#^(\w+/){1,2}\w+\.\w+$#',$dfn)))
      { return true; }
      else
      { return false; }
   }

   class Object
   {
      function __construct($members = array())
      {
         foreach ($members as $name => $value)
         { $this->$name = $value; }
      }

      function __call($name, $args)
      {
         if (is_callable($this->$name))
         {
            array_unshift($args, $this);
            return call_user_func_array($this->$name, $args);
         }
      }
   }
?>
