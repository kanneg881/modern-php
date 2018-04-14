<?php
/**
 * 地理編碼
 */

trait Geocodable
{
    /** @var string 地址 */
    protected $address;

    /** @var \Geocoder\Geocoder 地理編碼器 */
    protected $geocoder;

    /** @var \Geocoder\Model\AddressCollection 地理編碼結果 */
    protected $geocoderResult;

    /**
     * 設定地理編碼
     *
     * @param \Geocoder\Geocoder $geocoder 地理編碼器
     */
    public function setGeocoder(\Geocoder\Geocoder $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    /**
     * 設定地址
     *
     * @param string $address 地址
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * 取得緯度
     *
     * @return float 緯度
     */
    public function getLatitude()
    {
        if (!isset($this->geocoderResult)) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->first()->getLatitude();
    }

    /**
     * 取得經度
     *
     * @return float 經度
     */
    public function getLongitude()
    {
        if (!isset($this->geocoderResult)) {
            $this->geocodeAddress();
        }

        return $this->geocoderResult->first()->getLongitude();
    }

    /**
     * 編碼地址
     *
     * @return bool
     */
    protected function geocodeAddress()
    {
        $this->geocoderResult = $this->geocoder->geocode($this->address);

        return true;
    }
}
