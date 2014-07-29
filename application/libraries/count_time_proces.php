<?php
class Count_time_proces{
   function Count_time_proces(){              // the constructor
      $this->obj =& get_instance();
   }
  
   function start_time(){ 
      $mtime = microtime(); 
      $mtime = explode(' ', $mtime); 
      return $mtime;
   }
  
   function finish_time($starttime){
      $starttime = $starttime[1] + $starttime[0];
      $mtime = microtime();
      $mtime = explode(" ", $mtime);
      $mtime = $mtime[1] + $mtime[0];
      return ($mtime - $starttime);
   }
}
?>