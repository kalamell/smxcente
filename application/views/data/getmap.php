<?php
$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo $output;
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
foreach($rs as $r) {
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $r->school_id . '" ';
  echo 'name="' . parseToXML($r->school_name) . '" ';
  echo 'address="' . parseToXML($r->school_name.', '.$r->telephone) . '" ';
  echo 'lat="' . $r->lat . '" ';
  echo 'lng="' . $r->lng . '" ';
  echo 'type="school" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';
?>