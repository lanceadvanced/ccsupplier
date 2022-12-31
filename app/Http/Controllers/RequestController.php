<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class RequestController extends Controller
{
    public static function sendRequest($requestData): Response
    {
        return Http::accept('application/json')->withToken($requestData['authToken'])->post($requestData['uri'], $requestData['data']);
    }

    #[NoReturn] public static function sendExampleRequest(Request $request): RedirectResponse
    {
        $request->validate([
            'uri' => ['required'],
            'token' => ['required'],
            'reference' => ['required']
        ]);

        $requestData = [
            'uri' => $request->get('uri'),
            'authToken' => $request->get('token'),
            'data' => [
                'reference' => $request->get('reference'),
            ]
        ];

        $response = self::sendRequest($requestData);
        $parsedResponse = [
            'payload' => $response->collect()->toArray(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'reason' => $response->reason(),
            'failed' => $response->failed(),
            'unauthorized' => $response->unauthorized()
        ];


        return redirect(route('exampleResponse'))->with([
            'exampleResponse' => $parsedResponse,
            'onlyResponseData' => $request->get('onlyResponseData')
        ]);
    }
}
