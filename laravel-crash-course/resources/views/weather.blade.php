<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="icon" type="image/png" href="/30DayChallange/Day24/weather.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
        }

        .weather-card {
            max-width: 800px;
            margin: 30px auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom right, #182739, #0a1e2f);
            color: white;
        }

        .weather-card .card-body {
            padding: 20px;
        }

        .weather-card .main-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .weather-card .temperature {
            font-size: 3rem;
            font-weight: bold;
        }

        .weather-card .description {
            font-size: 1.2rem;
        }

        .weather-card .details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 15px;
            margin-top: 20px;
        }

        .weather-card .details div {
            flex-basis: 33%;
            margin-bottom: 10px;
        }

        .weather-card .forecast-container {
            margin-top: 20px;
            overflow-x: auto;
            padding-bottom: 10px;
        }

        .weather-card .forecast {
            display: flex;
            min-width: max-content;
        }

        .weather-card .forecast-item {
            flex: 0 0 auto;
            text-align: center;
            padding: 0 15px;
            min-width: 100px;
        }

        .weather-card .forecast-item:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Weather App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex ms-auto" role="search" id="searchForm">
                        <input class="form-control me-2" type="search" placeholder="Search Weather" aria-label="Search"
                            id="cityInput">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            @if (isset($weatherData))
                <div id="weatherCard" class="weather-card">
                    <div class="card-body">
                        <div class="main-info">
                            <div>
                                <h2 id="cityName" class="mb-2">{{ $weatherData['location']['city'] }}</h2>
                                <div class="description" id="description">
                                    {{ $weatherData['current_observation']['condition']['text'] }}</div>
                                <div class="unit-toggle">
                                    <button id="unitToggle" class="btn btn-sm btn-light">Switch to °C</button>
                                </div>
                            </div>
                            <div class="temperature" id="temperature">
                                {{ $weatherData['current_observation']['condition']['temperature'] }} °F</div>
                        </div>
                        <div class="details">
                            <div><i class="fas fa-tint"></i> <strong>Humidity:</strong> <span
                                    id="humidity">{{ $weatherData['current_observation']['atmosphere']['humidity'] }}</span>%
                            </div>
                            <div><i class="fas fa-wind"></i> <strong>Wind:</strong> <span
                                    id="windSpeed">{{ $weatherData['current_observation']['wind']['speed'] }}</span> mph
                                <span
                                    id="windDirection">{{ $weatherData['current_observation']['wind']['direction'] }}</span>
                            </div>
                            <div><i class="fas fa-eye"></i> <strong>Visibility:</strong> <span
                                    id="visibility">{{ $weatherData['current_observation']['atmosphere']['visibility'] }}</span>
                                mi</div>
                            <div><i class="fas fa-compress-arrows-alt"></i> <strong>Pressure:</strong> <span
                                    id="pressure">{{ $weatherData['current_observation']['atmosphere']['pressure'] }}</span>
                                mb</div>
                            <div><i class="fas fa-sun"></i> <strong>Sunrise:</strong> <span
                                    id="sunrise">{{ $weatherData['current_observation']['astronomy']['sunrise'] }}</span>
                            </div>
                            <div><i class="fas fa-moon"></i> <strong>Sunset:</strong> <span
                                    id="sunset">{{ $weatherData['current_observation']['astronomy']['sunset'] }}</span>
                            </div>
                        </div>
                        <h4 class="mt-4">Forecast</h4>
                        <!-- HTML Structure -->
                        <div class="forecast-container">
                            <div class="forecast" id="forecast">
                                @foreach ($weatherData['forecasts'] as $forecast)
                                    <div class="forecast-item">
                                        <div>{{ $forecast['day'] }}</div>
                                        <div><i
                                                class="fas fa-{{ \App\Helpers\WeatherHelper::getForecastIcon($forecast['code']) }}"></i>
                                        </div>
                                        <div class="forecast-temp">{{ $forecast['high'] }}°F /
                                            {{ $forecast['low'] }}°F</div>
                                        <div>{{ $forecast['text'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info">No weather data available.</div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let isCelsius = false;
            let currentTempF = parseInt(document.getElementById('temperature').textContent.split('°')[0]);

            function fahrenheitToCelsius(fahrenheit) {
                return Math.round((fahrenheit - 32) * 5 / 9);
            }

            function celsiusToFahrenheit(celsius) {
                return Math.round((celsius * 9 / 5) + 32);
            }

            function updateTemperatureDisplay() {
                const tempElement = document.getElementById('temperature');
                const unitToggleButton = document.getElementById('unitToggle');
                if (isCelsius) {
                    tempElement.textContent = `${fahrenheitToCelsius(currentTempF)}°C`;
                    unitToggleButton.textContent = 'Switch to °F';
                } else {
                    tempElement.textContent = `${currentTempF}°F`;
                    unitToggleButton.textContent = 'Switch to °C';
                }
                updateForecastTemperatures();
            }

            // Initialize forecast temperatures
            const forecastItems = document.querySelectorAll('.forecast-item');
            forecastItems.forEach(item => {
                const tempElement = item.querySelector('.forecast-temp');
                const [highF, lowF] = tempElement.textContent.split('°F / ').map(t => t.trim());
                item.dataset.highF = highF;
                item.dataset.lowF = lowF || highF; // Use high temp if low is missing
            });

            function updateForecastTemperatures() {
                const forecastItems = document.querySelectorAll('.forecast-item');
                forecastItems.forEach(item => {
                    const tempElement = item.querySelector('.forecast-temp');
                    const highF = parseInt(item.dataset.highF);
                    const lowF = parseInt(item.dataset.lowF);
                    if (isCelsius) {
                        const highC = fahrenheitToCelsius(highF);
                        const lowC = fahrenheitToCelsius(lowF);
                        tempElement.textContent = lowF ? `${highC}°C / ${lowC}°C` : `${highC}°C`;
                    } else {
                        tempElement.textContent = lowF ? `${highF}°F / ${lowF}°F` : `${highF}°F`;
                    }
                });
            }

            document.getElementById('searchForm').addEventListener('submit', (event) => {
                event.preventDefault();
                const city = document.getElementById('cityInput').value.trim();
                // Add your search functionality here
            });

            document.getElementById('unitToggle').addEventListener('click', () => {
                isCelsius = !isCelsius;
                updateTemperatureDisplay();
            });
        });
    </script>
</body>

</html>
