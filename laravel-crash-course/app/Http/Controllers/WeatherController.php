<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index(){
        return view("welcome");
    }
    public function fetchWeather(Request $request)
    {
        $city = $request->input('city', 'jalandhar');
        $client = new Client();
        $response = $client->request('GET', 'https://yahoo-weather5.p.rapidapi.com/weather', [
            'headers' => [
                'x-rapidapi-key' => env('WEATHER_API_KEY'),
                'x-rapidapi-host' => 'yahoo-weather5.p.rapidapi.com'
            ],
            'query' => [
                'location' => $city,
                'format' => 'json',
                'u' => 'f'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return view('weather', ['weatherData' => $data]);
    }

    public function showWeather()
    {
        // Sample weather data
        $data = [
            "location" => [
                "city" => "Delhi",
                "woeid" => 2295019,
                "country" => "India",
                "lat" => 28.643999,
                "long" => 77.091003,
                "timezone_id" => "Asia/Kolkata"
            ],
            "current_observation" => [
                "pubDate" => 1722889238,
                "wind" => [
                    "chill" => 93,
                    "direction" => "South",
                    "speed" => 9
                ],
                "atmosphere" => [
                    "humidity" => 86,
                    "visibility" => 6.03,
                    "pressure" => 1001
                ],
                "astronomy" => [
                    "sunrise" => "5:46 AM",
                    "sunset" => "7:08 PM"
                ],
                "condition" => [
                    "temperature" => 83,
                    "text" => "Partly Cloudy",
                    "code" => 30
                ]
            ],
            "forecasts" => [
                ["day" => "Tue", "date" => 1722873600, "high" => 90, "low" => 80, "text" => "Clear", "code" => 31],
                ["day" => "Wed", "date" => 1722960000, "high" => 93, "low" => 80, "text" => "Showers", "code" => 11],
                ["day" => "Thu", "date" => 1723046400, "high" => 88, "low" => 81, "text" => "Cloudy", "code" => 26],
                ["day" => "Fri", "date" => 1723132800, "high" => 90, "low" => 81, "text" => "Thunderstorms", "code" => 4],
                ["day" => "Sat", "date" => 1723219200, "high" => 89, "low" => 81, "text" => "Cloudy", "code" => 26],
                ["day" => "Sun", "date" => 1723305600, "high" => 89, "low" => 80, "text" => "Thunderstorms", "code" => 4],
                ["day" => "Mon", "date" => 1723392000, "high" => 84, "low" => 81, "text" => "Cloudy", "code" => 26],
                ["day" => "Tue", "date" => 1723478400, "high" => 89, "low" => 82, "text" => "Mostly Cloudy", "code" => 28],
                ["day" => "Wed", "date" => 1723564800, "high" => 90, "low" => 82, "text" => "Cloudy", "code" => 26],
                ["day" => "Thu", "date" => 1723651200, "high" => 93, "low" => 80, "text" => "Thunderstorms", "code" => 4],
                ["day" => "Fri", "date" => 1723737600, "high" => 94, "low" => 81, "text" => "Thunderstorms", "code" => 4]
            ]
        ];

        // Pass data to view
        return view('weather', ['weatherData' => $data]);
    }
}
