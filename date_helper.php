<?php
function month($month, $format = "mmmm"){
  if($format == "mmmm"){
    $fm = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  }elseif($format == "mmm"){
    $fm = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
  }
  
  return $fm[$month-1];
}
function day($day, $format = "dddd"){
  if($format == "dddd"){
    $fd = array("Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");
  }elseif($format == "ddd"){
    $fd = array("Sen","Sel","Rab","Kam","Jum","Sab","Min");
  }
  
  return $fd[$day-1];
}
?>