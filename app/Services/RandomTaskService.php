<?php
namespace App\Services;

class RandomTaskService
{
    public function getRandomTask() 
    {
        $httpClient = new \GuzzleHttp\Client();
        $request =
            $httpClient
                ->get('http://www.boredapi.com/api/activity/');
        $jsonResponse = json_decode($request->getBody()->getContents()); 
        $responsee = $jsonResponse->activity;

        return $responsee;
    }
}