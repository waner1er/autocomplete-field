<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiAddressService
{

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAddressData($myquery): array
    {
            $addresses = [];
        try {

            $client = HttpClient::create();
            $response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search', [
                'query' => [
                    'q' => str_replace(' ', '+', $myquery),
                    'type' => 'housenumber',
                    'limit' => 100
                ],
            ]);

            foreach ($response->toArray()['features'] as $address) {
                $addresses[] = [
                    'value' => $address['properties']['id'],
                    'text' => $address['properties']['label'],
                    'postcode' => $address['properties']['postcode'],
                    'city' => $address['properties']['city'],
                ];
            }

}
        catch (\Exception $e) {$addresses[] = ['text' => 'Une erreur s\'est produite', 'value' => 0];}


        return [
            'results' => $addresses,
        ];

    }
}
