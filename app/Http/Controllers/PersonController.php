<?php

namespace App\Http\Controllers;

use App\Models\Person;
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
    public function store(Request $request): JsonResponse
    {
        Person::create([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName')
        ]);
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

    /**
     * Activate a Person
     * @param Request $request
     * @return JsonResponse
     */
    public function activate(Request $request): JsonResponse
    {
        Person::find($request->get('id'))->activate();
        return new JsonResponse(['success' => 'Person activated.']);
    }
}
