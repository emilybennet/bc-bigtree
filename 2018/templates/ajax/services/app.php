<?

header('Content-type: application/json');

$scheduleMod = new scheduledEvents();
$events = $scheduleMod->getAll();

$guestsMod = new bcGuests();
$guests = $guestsMod->getApproved('route ASC');

// loop through events, serialize
$holdingEvents = array();

foreach ($events as $event) {
  $holdingEvents[$event['id']] = $event;
}

// loop though guests, serialize
$holdingGuests = array();
foreach ($guests as $guest) {
  $holdingGuests[$guest['id']] = $guest;
}

echo json_encode(array(
  'sessions' => $holdingEvents,
  'guests' => $holdingGuests
));

