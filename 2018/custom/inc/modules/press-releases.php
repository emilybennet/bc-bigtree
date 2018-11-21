<?
	class pressReleases extends BigTreeModule {

		var $Table = "bc_press_releases";
		var $Module = "15";


    public function __construct($debug = false) {
      global $cms;

      $this->rssFeedTitle = "BronyCon 2014 Press Releases";
      $this->rssFeedDescription = "The official RSS feed from BronyCon Public Relations.";
      $this->rssFeedLink = WWW_ROOT."about/press-media/press-releases/";
      
      $this->maxCacheAge = 60 * 60 * 2; // two hours
      $this->cache_prefix = "press-releases.btc";

      $this->cache_root = SERVER_ROOT . "cache/";
      $this->cache_base = $this->cache_root . $this->cache_prefix;
      
      if (!is_dir($this->cache_root)) {
        mkdir($this->cache_root);
        chmod($this->cache_root,0777);
      }
      
    }



    /*
      Function: cacheAge
        Return cache filetime; "0" if file does not exist
    */
    public function cacheAge($file) {
      return file_exists($file) ? filemtime($file) : 0;
    }



    /*
      Function: formatReleaseFeed
        Formats the release feed into some fun RSS/XML.

      Parameters:
        data - the data to format.

      Returns:
        Formatted feed.
     */
    
    private function formatReleaseFeed($data) {
      $feedPubDate = gmdate(DATE_RSS, time());

      $return = '<rss version="2.0">';
      $return .= '<channel>';
      $return .= '<title>'.$this->rssFeedTitle.'</title>';
      $return .= '<description>'.$this->rssFeedDescription.'</description>';
      $return .= '<link>'.$this->rssFeedLink.'</link>';
      $return .= '<pubDate>'.$feedPubDate.'</pubDate>';

      foreach ($data as $item) {
        $return .= '<item>';
        $return .= '<title>'.htmlentities($item['headline']).'</title>';
        $return .= '<description>'.htmlentities($item['release']).'</description>';
        $return .= '<pubDate>'.gmdate(DATE_RSS, strtotime($item['publish_at'])).'</pubDate>';
        $return .= '<author>'.$item['author_email'].' ('.$item['author_name'].')</author>';
        $return .= '<link>'.$this->rssFeedLink.$item['route'].'</link>';
        $return .= '<guid isPermaLink="true">'.$this->rssFeedLink.$item['route'].'</guid>';
        $return .= '</item>';
      }
      $return .= '</channel>';
      $return .= '</rss>';

      return $return;

    }



    /*
      Function: getReleaseFeed
        Returns the xml from the cache file or makes one if it's aged/missing.

      Returns:
        XML for an RSS feed
     */
    
    public function getReleaseFeed() {
      global $cms;

      $cacheFile = $this->cache_base;
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        $releaseFeed = $this->getReleaseFeedData();
        $releaseFeed = $this->formatReleaseFeed($releaseFeed);
        $releaseFeed = trim(preg_replace('/\s+/', ' ', $releaseFeed));
        file_put_contents($cacheFile, $releaseFeed);
        chmod($cacheFile, 0777);
      } else {
        $releaseFeed = file_get_contents($cacheFile);
      }

      return $releaseFeed;
    }



    /*
      Function: getReleaseFeedData
        Runs a little query to get the press release data

      Returns:
        An array.
     */
    
    private function getReleaseFeedData() {
      $q = sqlquery("SELECT `pr`.`headline`, `pr`.`release`, `pr`.`publish_at`, `pr`.`route`, `mc`.`email` as `author_email`, `mc`.`name` as `author_name`
        FROM `bc_press_releases` `pr`, `bc_media_contacts` `mc`
        WHERE (publish_at <= NOW() OR publish_at IS NULL) 
          AND `pr`.`approved` = 'on'
          AND `pr`.`media_contact` = `mc`.`id`
        ORDER BY publish_at DESC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;      
    }
    


	

    /*
      Function: getReleaseList
        A happy paginatable list of Press Releases.

      Parameters:
        limit - total number to return (defaults to 15)
        offset - how many we should offset from.

      Returns:
        An array!
     */
    
    public function getReleaseList($limit = 15, $offset = 0) {
      $q = sqlquery("SELECT `pr`.`headline`, `pr`.`publish_at`, `pr`.`abstract`, `pr`.`release`, `pr`.`route`
        FROM `$this->Table` `pr`
        WHERE (publish_at <= NOW() OR publish_at IS NULL)
          AND `pr`.`approved` = 'on'
        ORDER BY publish_at DESC
        LIMIT $limit
        OFFSET $offset");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;
    }


  }
?>
