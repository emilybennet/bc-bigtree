<?
  $footerCollectionsMod = new footerCollections();
  $footerImagesMod = new footerImages();
  $artistsMod = new bcArtists();

  $collections = $footerCollectionsMod->getAll();

  foreach ($collections as $key=>$collection) {
    $images = $footerImagesMod->getImagesByCollection($collection["id"]);
    $collections[$key]["footers"] = $images;
  }
?>

<html>
<head>
  <title>BronyCon.org Footer Images</title>
  <link rel="stylesheet" type="text/css" media="screen" href="/css/app.min.css" />
  <style>
    body { padding: 40px; }
    .footer-set h2 { border-bottom: 1px solid white; color: white; margin-top: 0; }
    .footer-set span { color: white; display: block; }
    .footer-set span.footer-name { font-weight: bold; }
    .footer-set img { margin-bottom: 10px; transition: .2s background; width: 200px; }
    .footer-set img:hover { background: rgba(255,255,255,.1); }
    .footer-set li { display: inline-block; list-style: none; margin: 0 40px 40px 0; }
  </style>
</head>
<body>
  <? foreach ($collections as $set): ?>
  <section class="footer-set">
    <h2><?=$set["collection_name"]?> <small>Active: <?=($set["approved"])?"Yes":"No"?>; Weight: <?=($set["weight"])?$set["weight"]:"n/a"?></small></h2>
    <ul>
      <? 
        foreach ($set["footers"] as $f):
          $artist = $artistsMod->get($f["artist"]);
      ?>
        <li>
          <a href="<?=$f['image_retina']?>"><img src="<?=$f['image']?>" alt="<?=$f['name']?>" /></a>
          <span class="footer-name"><?=$f["name"]?></span>
          <span class="footer-artist"><?=$artist["name"]?></span>
        </li>
      <? endforeach; ?>
    </ul>
  </section>
  <? endforeach; ?>
</body>
</html>