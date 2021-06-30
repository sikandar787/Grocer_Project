<?php
if(isset($_GET['data'])){
    $data = $_GET['data'];
    $lat = number_format($data['lat'], 4);
    $lng = number_format($data['lng'], 4);

}
?>