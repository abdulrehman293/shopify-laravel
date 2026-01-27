<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class ShopifyAppController extends Controller
{
    public function index()
    {
        $shop = env('SHOPIFY_STORE');
        $token = env('SHOPIFY_ADMIN_TOKEN');
        $apiVersion = env('SHOPIFY_API_VERSION');

        $client = new Client([
            'base_uri' => "https://{$shop}/admin/api/{$apiVersion}/",
        ]);

        $response = $client->get('products.json', [
            'headers' => [
                'X-Shopify-Access-Token' => $token,
                'Accept' => 'application/json',
            ],
            'query' => ['limit' => 5],
        ]);

        $products = json_decode($response->getBody()->getContents(), true)['products'] ?? [];

        return view('shopify.index', compact('products'));
    }
}
