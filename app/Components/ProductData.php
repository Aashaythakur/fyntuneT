<?php

namespace App\Components;

use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

class ProductData {

    public static function getProductList( $id = 0 ) {
        $products = [];
        $client = new Client();
        if ( !empty( $id ) ) {
            $response       = $client->request( 'get', 'https://fakestoreapi.com/products/'.$id );
            if ( !empty( $response->getBody() ) ) {
                $data = json_decode( $response->getBody(), true );
            }
        } else {
            $response       = $client->request( 'get', 'https://fakestoreapi.com/products' );
            if ( !empty( $response->getBody() ) ) {
                $products = json_decode( $response->getBody(), true );
            }
            if ( !empty( $products ) ) {
                foreach ( $products as $product ) {
                    $data[$product['id']] = $product;
                }
            }
        }

       
        if ( !empty( $data ) ) {
            return $data;
        } 
        $data[1]['id'] = 1;
        $data[1]['title'] = 'Shoes For Men  (Black)';
        $data[1]['image'] = 'https://rukminim1.flixcart.com/image/800/960/kg9qbgw0-0/shoe/y/l/a/380815-puma-black-silver-original-imafwgy4mzm7uefu.jpeg?q=50';
        $data[1]['description'] = 'Zod Runner V3 IDP Running Shoes For Men  (Black)';
        $data[1]['category'] = 'shoes';
        $data[1]['price'] = 100;

        $data[2]['id'] = 2;
        $data[2]['title'] = 'Polyester Door Curtain ';
        $data[2]['image'] = 'https://rukminim1.flixcart.com/image/416/416/j366mq80/curtain/2/7/q/brown-long-tree-213-ltree-1-eyelet-panipat-textile-hub-original-imaeuczvahfsrhbu.jpeg?q=70';
        $data[2]['description'] = 'Panipat Textile Hub 213 cm (7 ft) Polyester Door Curtain (Pack Of 2)  (Floral, Brown)';
        $data[2]['category'] = 'Home Furnishing';
        $data[2]['price'] = 200;

        if ( !empty( $id ) ) {
            return $data[$id];
        }
        return $data;
    }

}
