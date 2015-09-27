<?
  header('Content-type: text/xml');

  $pressReleasesMod = new pressReleases();
  $pressReleaseRSS = $pressReleasesMod->getReleaseFeed();

 echo $pressReleaseRSS;