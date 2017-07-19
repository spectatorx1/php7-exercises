<?php
  function getPage()
  {
    $hour = date("G");
    if($hour > 22 || $hour < 4){
      return("indexNight.html");
    }
    else if($hour >= 4 && $hour < 12){
     return("indexMorning.html");
    }
    else if($hour >= 12 && $hour < 18){
      return("indexAfternoon.html");
    }
    else if($hour >= 18 && $hour <= 22){
      return("indexEvening.html");
    }
  }
  include(getPage());