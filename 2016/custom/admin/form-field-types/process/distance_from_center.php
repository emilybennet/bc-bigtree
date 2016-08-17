<?
	$venuesMod = new bcVenues();
	$centerLat = $venuesMod->center_lat;
	$centerLng = $venuesMod->center_lng;
	$entryLat = $bigtree["entry"]["latitude"];
	$entryLng = $bigtree["entry"]["longitude"];

	$distance = $venuesMod->distanceBetweenPoints($centerLat, $centerLng, $entryLat, $entryLng);

	$field["output"] = htmlspecialchars($distance);
?>