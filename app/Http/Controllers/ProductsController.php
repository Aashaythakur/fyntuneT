<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Cookie;
use App\Components\ProductData;
use Illuminate\Support\Facades\Auth; 

class ProductsController extends Controller {
    public function index() {
       
        $products = [];

      
        $products = ProductData::getProductList();

        return view( 'products.products', ['products'=>$products] );

    }

    public function show( $id ) {

        /* $client = new Client();
        $response       = $client->request( 'get', 'https://fakestoreapi.com/products/'.$id );
        $products = [];

        if ( !empty( $response->getBody() ) ) {
            $products = json_decode( $response->getBody(), true );
        }
        */
        $products = ProductData::getProductList( $id );
        return view( 'products.show', ['product'=>$products] );
    }

    public function addtocart( Request $request ) {

        // p( $_POST );
        $cartdetails = isset( $_COOKIE['cartdetails'] ) ? $_COOKIE['cartdetails']:'';

        $myNumber = $request->input( 'myNumber' );
        $pid = $request->input( 'pid' );

        if ( empty( $cartdetails ) ) {
            $cartdetails = [];
            $cartdetails[$pid]['pid'] = $pid;
            $cartdetails[$pid]['myNumber'] = $myNumber;

            setcookie( 'cartdetails', \json_encode( $cartdetails ), time() + ( 3600 ), '/' );

        } else {
            $cartdetails = \json_decode( $cartdetails, true );
            if ( isset( $cartdetails[$pid] ) ) {
                $cartdetails[$pid]['myNumber'] = $cartdetails[$pid]['myNumber'] + $myNumber;
            } else {
                $cartdetails[$pid]['pid'] = $pid;
                $cartdetails[$pid]['myNumber'] = $myNumber;

            }
            setcookie( 'cartdetails', \json_encode( $cartdetails ), time() + ( 3600 ), '/' );
        }

        return redirect( route( 'cartdetails' ) );

    }

    public function cartdetails( Request $request ) {
        $allcartdetails = [];
        $cartdetails = isset( $_COOKIE['cartdetails'] ) ? $_COOKIE['cartdetails']:'';
        if ( !empty( $cartdetails ) ) {
            $allcartdetails = json_decode( $cartdetails, true );
        }else{
            return redirect( route( 'product' ) );
        }
        return view( 'products.cartdetails', ['allcartdetails'=>$allcartdetails] );
    }
    public function placeorder( Request $request ) {

        if (!Auth::check()) 
        {
            return redirect( route( 'login' ) );
        }else{
            unset($_COOKIE['cartdetails']); 
            setcookie('cartdetails', null, -1, '/'); 
        }
        // $allcartdetails = [];
        // $cartdetails = isset( $_COOKIE['cartdetails'] ) ? $_COOKIE['cartdetails']:'';
        // if ( !empty( $cartdetails ) ) {
        //     $allcartdetails = json_decode( $cartdetails, true );
        // } 
        return view( 'products.success');
    }
    

}
