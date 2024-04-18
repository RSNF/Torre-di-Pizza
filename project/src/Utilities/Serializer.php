<?php

namespace App\Utilities;

use SimpleXMLElement;

class Serializer
{
    /**
     * @param array $data
     * @return string XML string
     */
    public static function serializeToXML($data)
    {
        $xml = new SimpleXMLElement("<?xml version='1.0' encoding='UTF-8' standalone='yes'?><root/>");

        self::serializeToXMLHelper($data, $xml);

        return $xml->asXML();
    }

    private static function serializeToXMLHelper($data, &$xml)
    {
        foreach ($data as $key => $value) {

            if (is_array($value)) {

                if (is_numeric($key)) {
                    $key = 'item-' . $key;
                }

                $subnode = $xml->addChild($key);
                self::serializeToXMLHelper($value, $subnode);
            } else {

                $xml->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    /**
     * @param string $xml
     * @return array
     */
    public static function unserializeFromXML($xml)
    {
        $xml = simplexml_load_string($xml, null, LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        return $array;
    }

    /**
     * @param array $data
     * @return string JSON string
     */
    public static function serializeToJSON($data)
    {
        return json_encode($data);
    }

    /**
     * @param string $json
     * @return array
     */
    public static function unserializeFromJSON($json)
    {
        return json_decode($json, true);
    }
}

?>