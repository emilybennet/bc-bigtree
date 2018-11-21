<?
	class footerImages extends BigTreeModule {

		var $Table = "bc_footer_images";
		var $Module = "3";



    /*
      Function: selectActiveFooterCollections
        Returns a nice array of the active footer collections 
        and their weight.

      Returns:
        An array, where each key is the id of a footer collection 
        and value is the weight.
     */
    
    private function getActiveFooterCollections() {
      $q = sqlquery("SELECT `id`, `weight`
        FROM `bc_footer_collections`
        WHERE `approved` = 'on'
          AND (publish_at <= NOW() OR publish_at IS NULL)
          AND (expires_at >= NOW() OR expires_at IS NULL)");

      $items = array();
      while ($f = sqlfetch($q)) {
        $id = $f['id'];
        $items[$id] = ($f['weight']) ? (int)$f['weight'] : 50;
      }
      return $items;
    }



    /*
      Function: getImagesByCollection
        Gives us all footer images in a given collection.

      Parameters:
        collectionId - the collection id

      Returns:
        An array of goodies.
     */
  
    public function getImagesByCollection($collectionId) {
      $q = sqlquery("SELECT * FROM `bc_footer_images` WHERE `collection_id` = '".sqlescape($collectionId)."'");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }
      return $items;
    }



    /*
      Function: getRandomApproved
        Like BigTree's getRandom, only selects from approved.

      Returns:
        A single entry from the table.
     */

    public function getRandomApproved(){
      $f = sqlfetch(sqlquery("SELECT * FROM `".$this->Table."` WHERE `approved` = 'on' ORDER BY RAND() LIMIT 1"));
      return $this->get($f);
    }    



    /*
      Function: selectFooterImage
        Chooses a footer image at random from a randomly active footer image collection.

      Parameters:
        collectionId - optional, collection to randomly choose a footer image from.

      Returns:
        Array of the selected image.
     */
    
    public function selectFooterImage($collectionId = false) {
      if (!$collectionId) {
        $collectionWeights = $this->getActiveFooterCollections();
        if (empty($collectionWeights)) {
          return false;
        }
        $collectionId = getRandomWeightedElement($collectionWeights);
      }

      $collectionImages = $this->getImagesByCollection($collectionId);
      return $collectionImages[array_rand($collectionImages)];
    }

	}
?>
