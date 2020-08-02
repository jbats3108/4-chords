<?php

include __DIR__ . '/partials/header.php';
require __DIR__ . '/../templates/table-row.php';
require __DIR__ . '/../src/get_tracks.php';

foreach ($tracks_data as $track) {
 $track_obj = new TrackRow($track);
 $row = $track_obj->create_row();
 echo $row;
}

include __DIR__ . '/partials/footer.php';