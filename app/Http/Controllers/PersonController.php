<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\Person\CreatePersonRequest;
use App\Services\Person\CreatePersonService;
use App\Services\Person\TogglePersonActivationRequest;
use App\Services\Person\TogglePersonActivationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $people = Person::all();
        return new JsonResponse(['allPeople' => $people]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request, CreatePersonService $service): JsonResponse
    {
        $service->execute(new CreatePersonRequest($request->get('firstName'), $request->get('lastName')));
        return new JsonResponse(['success' => 'Person stored successfully.']);
    }

    /**
     * Display the Person
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $person = Person::find($request->get('id'));
        return new JsonResponse(['success' => $person]);
    }

    /**
     * Update the Person data
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        Person::find($request->get('id'))->update([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName')
        ]);
        return new JsonResponse();
    }

    /**
     * Delete the Person object
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        Person::find($request->get('id'))->delete();
        return new JsonResponse(['success' => 'Person deleted.']);
    }

    public function togglePersonActivation(Request $request, TogglePersonActivationService $service): JsonResponse
    {
        $service->execute(
            new TogglePersonActivationRequest(
                $request->get('id'),
                $request->get('shouldBeActivated') == 1
            ));
        return new JsonResponse(['success' => 'Person activation toggled.']);
    }
}
