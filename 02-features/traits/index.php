<?php
require 'vendor/autoload.php';
require 'Geocodable.php';
require 'RetailStore.php';

/** @var \Ivory\HttpAdapter\CurlHttpAdapter $adapter 適配器 */
$adapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
/** @var \Geocoder\Provider\GoogleMaps $geocoder google 地圖 */
$geocoder = new \Geocoder\Provider\GoogleMaps($adapter);

/** @var RetailStore $retailStore 零售店 */
$retailStore = new RetailStore();
$retailStore->setAddress('420 9th Avenue, New York, NY 10001 USA');
$retailStore->setGeocoder($geocoder);

/** @var float $latitude 經度 */
$latitude = $retailStore->getLatitude();
/** @var float $longitude 緯度 */
$longitude = $retailStore->getLongitude();

echo $latitude, ':', $longitude;
