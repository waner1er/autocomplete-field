<?php

namespace App\Controller;

use App\Service\ApiAddressService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddressController extends AbstractController
{

    #[Route('/address_autocomplete', name: 'app_address_autocomplete')]
    public function address(Request $request, ApiAddressService $apiAddressService): JsonResponse
    {
        $response = $apiAddressService->getAddressData($request->query->get('query'));
        return  $this->json($response);
    }

    #[Route('/postcode_autocomplete', name: 'app_postcode_autocomplete')]
    public function postcode(Request $request, ApiAddressService $apiAddressService): JsonResponse
    {
        $response = $apiAddressService->getPostcodeData($request->query->get('query'));
        return  $this->json($response);
    }

    #[Route('/city_autocomplete', name: 'app_city_autocomplete')]
    public function city(Request $request, ApiAddressService $apiAddressService): JsonResponse
    {
        $response = $apiAddressService->getCityData($request->query->get('query'));
        return  $this->json($response);
    }

}
