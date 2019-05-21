<?php
namespace App;

use App\Composite\JSONModelComposite;
use App\Composite\JSONModelLeaf;

class Client
{
    /**
     * This is a demo client call to the composite
     * @param null $rootName
     * @return false|string
     */
    public static function run($rootName = null)
    {
        $root = new JSONModelComposite($rootName, []);
        $individual = new JSONModelComposite('individual', [
            'first_name' => 'Mohammed',
            'last_name' => 'Abdoh'
        ]);
        $address = new JSONModelComposite('address', [
            'street' => 'Kapellenstr',
            'post_code' => '03415',
            'host_number' => '9a'
        ]);
        $tax = new JSONModelComposite('tax', [
            'class' => 1,
            'percentage' => 36
        ]);
        $taxDetails = new JSONModelLeaf('tax_details', [
            'category' => '5a',
            'certificate' => true
        ]);
        $map = new JSONModelComposite('map', [
            'lang' => '1541234.5354',
            'lat' => '2542154.5644'
        ]);
        $mapImages = new JSONModelLeaf('images', [
            'png' => 'map_image.png',
            'jpeg' => 'map_image.jpeg',
        ]);
        $level = new JSONModelLeaf('level', ['data' => 'name']);
        $map->addNode($mapImages);
        $tax->addNode($taxDetails);
        $address->addNode($map);
        $individual->addNode($address);
        $individual->addNode($tax);
        $root->addNode($individual);
        $root->addNode($level);
        return json_encode($root->render(), JSON_PRETTY_PRINT);
    }
}