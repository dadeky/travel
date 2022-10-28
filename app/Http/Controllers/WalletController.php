<?php

namespace App\Http\Controllers;

use App\Exceptions\Person\PersonIsNotActiveException;
use App\Services\Wallet\ChangeNameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    /**
     * @param Request $request
     * @param ChangeNameService $service
     * @return JsonResponse
     * @throws PersonIsNotActiveException
     */
    public function changeName(Request $request, ChangeNameService $service): JsonResponse
    {
        $service->execute($request->get('id'), $request->get('name'));
        return new JsonResponse(['success' => 'Name assigned to wallet.']);
    }
}
