<?php
/** @var resource $json flickr 應用程式介面資源 */
$json = file_get_contents(
    'http://api.flickr.com/services/feeds/photos_public.gne?format=json'
);
echo $json;
