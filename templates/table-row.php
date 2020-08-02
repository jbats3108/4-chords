<?php

class TrackRow {

 /**
  * Class constructor.
  */
 public function __construct(array $track = null) {
  $this->track = $track['track'];
  $this->track_name = $this->track['name'];
  $this->artist_name = $this->track['artists'][0]['name'];
  $this->root_search_url = "https://www.ultimate-guitar.com/search.php?search_type=title&value=";
  $this->search_url = $this->create_search_url();
 }

 private function create_search_url() {

  $search_str = rawurlencode($this->track_name . " " . $this->artist_name);

  $search_url = $this->root_search_url . $search_str;

  return $search_url;

 }

 public function create_row() {

  $search_anchor = "<a class='search-link' href='{$this->search_url}' target='_BLANK'>Search for this track on Ultimate Guitar</a>";

  $track_name_cell = "<td class='track-name'>{$this->track_name}</td>";
  $artist_name_cell = "<td class='artist-name'>{$this->artist_name}</td>";
  $search_url_cell = "<td class='search-url'>{$search_anchor}</td>";

  $row = "<tr class='track-row'>{$track_name_cell}{$artist_name_cell}{$search_url_cell}";

  return $row;
 }
}