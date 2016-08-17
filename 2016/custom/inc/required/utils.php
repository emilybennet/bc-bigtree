<?
// happy semantic nav build out!
function recurseNav($nav, $mypage = "", $isSitemap = false, $rootClass = "") {

  $lpage = DOMAIN.$_SERVER["REQUEST_URI"];
  $i = 0;
  $count = count($nav);
  if ($count > 0) {
    if (!empty($rootClass)) {
      echo '<ul class="'.$rootClass.'">';
    } else {
      echo '<ul>';
    }
    foreach ($nav as $navitem) {
      $link = $navitem["link"];
      $target = (isset($navitem['new_window']) && $navitem['new_window'] == 'Yes') ? ' target="_blank"' : '';
      $hasSubnav = $navitem["children"];

      $anchorClassArray = array();
      $liClassArray = array();

      if (strpos($mypage, $link) !== false && $hasSubnav) {
        array_push($anchorClassArray, 'sub-current');
      }
      if ($mypage == $link || $mypage == $navitem["id"]) {
        array_push($anchorClassArray, 'active');
      }
      if ($navitem["class"] != "") {
        array_push($anchorClassArray, $navitem["class"]);
      }
      
      if ($hasSubnav) {
        array_push($liClassArray, 'has-subnav');
      }
      if (strpos($mypage, $link) !== false && $hasSubnav) {
        array_push($liClassArray, 'sub-current');
      }
      if ($mypage == $link || $mypage == $navitem["id"]) {
        array_push($liClassArray, 'active');
      }
      if ($target) {
        array_push($liClassArray, 'external');
        array_push($anchorClassArray, 'external');
      }
      if ($i == 0) {
        array_push($liClassArray, 'first');
      }
      if ($i == $count-1) {
        array_push($liClassArray, 'last');
      }
      if ($i % 2 == 0) {
        array_push($liClassArray, 'even');
      } else {
        array_push($liClassArray, 'odd');
      }
      
      $liClass = ' class="'.implode(' ', $liClassArray).'"';
      $anchorClass = ' class="'.implode(' ', $anchorClassArray).'"';
      
      echo '<li' . $liClass . '>';
      echo '<a href="' . $link . '"' . $target . $anchorClass . '><span>' . $navitem["title"] .'</span></a>';

      if ((strpos($lpage, $link) !== false && $navitem["children"]) || $isSitemap === true) {
        recurseNav($navitem["children"], $mypage, $isSitemap, 'sub-nav');
      }

      echo '</li>';
      $i++;
    }
    echo '</ul>';
  }
}


// let's figure out time from now!

function relativeTime($time) {
  $delta = strtotime(date('r')) - strtotime($time);

  $second = 1;
  $minute = 60 * $second;
  $hour = 60 * $minute;
  $day = 24 * $hour;
  $month = 30 * $day;
  
  if ($delta < 2 * $minute) {
    return "1 min ago";
  } elseif ($delta < 45 * $minute) {
    return floor($delta / $minute) . " min ago";
  } elseif ($delta < 90 * $minute) {
    return "1 hour ago";
  } elseif ($delta < 24 * $hour) {
    return floor($delta / $hour) . " hours ago";
  } elseif ($delta < 48 * $hour) {
    return "yesterday";
  } elseif ($delta < 30 * $day) {
    return floor($delta / $day) . " days ago";
  } elseif ($delta < 12 * $month) {
    $months = floor($delta / $day / 30);
    return $months <= 1 ? "1 month ago" : $months . " months ago";
  } else {
    $years = floor($delta / $day / 365);
    return $years <= 1 ? "1 year ago" : $years . " years ago";
  }
}


function cacheAge($file) {
  return file_exists($file) ? filemtime($file) : 0;
}


function truncateString($string, $max) {
  if(strlen($string) > $max) {
    $string = substr($string, 0, $max);
    $i = strrpos($string, " ");
    $string = substr($string, 0, $i);
    $string = $string . "&hellip;";
  }
  return $string;
}


/**
 * getRandomWeightedElement()
 * Utility function for getting random values with weighting.
 * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
 * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
 * The return value is the array key, A, B, or C in this case.  Note that the values assigned
 * do not have to be percentages.  The values are simply relative to each other.  If one value
 * weight was 2, and the other weight of 1, the value with the weight of 2 has about a 66%
 * chance of being selected.  Also note that weights should be integers.
 * 
 * @param array $weightedValues
 */

function getRandomWeightedElement(array $weightedValues) {
  $rand = mt_rand(1, (int) array_sum($weightedValues));

  foreach ($weightedValues as $key => $value) {
    $rand -= $value;
    if ($rand <= 0) {
      return $key;
    }
  }
}


/*
  Function: locationLog
    used to log the location as displayed on the site on April Fools

  Parameters:
    location - string of what text we displayed
 */
function locationLog($location) {
  
  if ($location == "Absecon") {
    return false;
  }

  $qCheck = "SELECT id,count FROM `bc_april1_locations` 
            WHERE `location` = '".sqlescape($location)."' LIMIT 1";
  $row = sqlfetch(sqlquery($qCheck));
  if ($row) {
    $newCount = $row["count"]*1+1;
    $qUpdate = "UPDATE `bc_april1_locations` 
                SET `count` = '".$newCount."'
                WHERE id = '".$row["id"]."'";
    sqlquery($qUpdate);
    return false;
  }
  sqlquery("INSERT INTO `bc_april1_locations` (`location`, `count`) VALUES ('".sqlescape($location)."', 1)");
}