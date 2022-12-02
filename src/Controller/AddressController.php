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
    public function autocomplete(Request $request, ApiAddressService $apiAddressService): JsonResponse
    {
        $response = $apiAddressService->getAddressData($request->query->get('query'));
        return  $this->json($response);
    }
}
