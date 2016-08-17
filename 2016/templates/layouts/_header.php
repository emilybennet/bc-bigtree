<?
  // if we're rolling on https, let's force it on www_root
  if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443) {
    $www_root = $secure_root;
  }

  // lockout on dev.
  if ($_SERVER['BIGTREE_ENV'] == 'dev' && !isset($_SESSION['bcCoreLock']['user'])) {
    if ($_GET["bigtree_htaccess_url"]) {
      header('Location: '.$www_root.'ajax/login/?redirect='.urlencode($_GET["bigtree_htaccess_url"]));
    } else {
      header('Location: '.$www_root.'ajax/login/');
    }
  }

  // if we have an affiliate code, let's capture a cookie for that user
  if (isset($_GET["aff"])) {
    setcookie("affiliate", $_GET["aff"], time()+60*60*24*60, "/", $_SERVER["HTTP_HOST"]);
  }

  $defaultTitle = $cms->getSetting('default_title');
  $defaultMetaKeywords = $cms->getSetting('default_meta_keywords');

  if ($customOpenGraphImage) {
    $ogImage = $www_root.$customOpenGraphImage;
  } else {
    $ogImage = $www_root.'images/opengraph_2016.png';
  }

  if ($customPageDesc) {
    $pageDesc = $customPageDesc;
  } elseif ($page['meta_description']) {
    $pageDesc = $page['meta_description'];
  } else {
    $pageDesc = $cms->getSetting('default_meta_description');
  }

  $topLevel = $cms->getToplevelNavigationId();
  $nav = $cms->getNavByParent(0, 2);
  $navTray = $cms->getNavByParent(0, 3);

  $navTrayHome = array(
    'id' => '0',
    'parent' => '-1',
    'title' => 'Home',
    'route' => '/',
    'link' => $www_root,
    'new_window' => false,
    'children' => array()
    );

  array_unshift($navTray, $navTrayHome);

?>

<!DOCTYPE html>
<html>

<head>
  <title><?=($page['title']) ? $page['title'] . ' • ' . $defaultTitle : $defaultTitle; ?></title>
  <meta name="keywords" content="<?=($page['meta_keywords'])?$page['meta_keywords']:$defaultMetaKeywords;?>" />
  <meta name="description" content="<?=$pageDesc?>" />
  <meta data-server-name="<?=strtolower($bigtree['config']['server_info']['nodename'])?>" data-php-environment="<?=$_SERVER['BIGTREE_ENV']?>" data-app-release="<?=$bigtree['config']['package_info']['version']?>" />
  <meta content="width=device-width, initial-scale=1.0, minimum-scale = 1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="robots" content="all" />
  <link rel="shortcut icon" href="<?=$www_root?>favicon.ico" type="image/x-icon">
  <link rel="author" href="<?=$www_root?>humans.txt" />

  <meta name="twitter:site" content="@bronycon" />
  <meta property="og:title" content="<?=($page['title']) ? $page['title'] . ' • ' . $defaultTitle : $defaultTitle;?>" />
  <meta property="og:description" content="<?=$pageDesc?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?=$www_root.$page['path']?>" />
  <meta property="og:image" content="<?=$ogImage?>" />
  <link href="https://plus.google.com/117749353168703446152" rel="publisher" />

  <link rel="apple-touch-icon" href="<?=$www_root?>images/apple-touch/apple-touch-icon-60.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$www_root?>images/apple-touch/apple-touch-icon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?=$www_root?>images/apple-touch/apple-touch-icon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=$www_root?>images/apple-touch/apple-touch-icon-152.png">

<?
// Okay, let's get those css/js files
$cachebusterFile = $server_root."site/cachebuster.php";

if (file_exists($cachebusterFile)) {
  $assetFiles = include $cachebusterFile;
  foreach ($assetFiles['md5'] as $file => $fileHash) {
    $f = pathinfo($file);
    $asset = $www_root.$file;
    if ($_SERVER['BIGTREE_ENV'] == 'prod') {
      $asset .= '?v='.$fileHash;
    }
    if ($f['extension'] == 'css') {
      echo '  <link rel="stylesheet" type="text/css" media="screen" href="'.$asset.'" />';
    }
  }
}
?>
</head>

<body>

  <div class="global-wrapper">
    <nav class="nav-slider-navigation">
      <? recurseNav($navTray, $topLevel, true); ?>
    </nav>

    <section class="site-wrapper">

      <header class="primary sticker">
        <div class="wrap">
          <a href="#" class="nav-slider-control visible-xs visible-sm">
            <span class="glyphicon-font">&#xe114;</span>
            <span class="short">Nav</span>
            <span class="full">Navigation</span>
          </a>
          <a href="/"class="brand sticker"><h1>BronyCon</h1></a>
          <nav class="primary visible-md visible-lg">
            <? recurseNav($nav, $topLevel, true); ?>
          </nav>
        </div>

      </header>
