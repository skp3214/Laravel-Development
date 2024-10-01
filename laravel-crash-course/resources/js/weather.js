document.addEventListener('DOMContentLoaded', function () {
    const isCelsius = false;
    let currentTempF = 0;

    function fahrenheitToCelsius(fahrenheit) {
        return Math.round((fahrenheit - 32) * 5 / 9);
    }

    function updateTemperatureDisplay() {
        const tempElement = document.getElementById('temperature');
        if (isCelsius) {
            tempElement.textContent = `${fahrenheitToCelsius(currentTempF)}°C`;
        } else {
            tempElement.textContent = `${currentTempF}°F`;
        }
    }

    function setTemperature(tempF) {
        currentTempF = tempF;
        updateTemperatureDisplay();
    }

    function updateForecastTemperatures() {
        const forecastItems = document.querySelectorAll('.forecast-item');
        forecastItems.forEach(item => {
            const highTemp = parseInt(item.getAttribute('data-high'));
            const lowTemp = parseInt(item.getAttribute('data-low'));
            if (isCelsius) {
                item.querySelector('.forecast-temp').textContent = `${fahrenheitToCelsius(highTemp)}°C / ${fahrenheitToCelsius(lowTemp)}°C`;
            } else {
                item.querySelector('.forecast-temp').textContent = `${highTemp}°F / ${lowTemp}°F`;
            }
        });
    }

    async function fetchWeather(city = 'jalandhar') {
        try {
           

            // Update DOM elements
            document.getElementById('cityName').textContent = `${cityName}, ${country}`;
            setTemperature(temp);
            document.getElementById('description').textContent = desc;
            document.getElementById('humidity').textContent = humidity;
            document.getElementById('windSpeed').textContent = windSpeed;
            document.getElementById('windDirection').textContent = windDirection;
            document.getElementById('visibility').textContent = visibility;
            document.getElementById('pressure').textContent = pressure;
            document.getElementById('sunrise').textContent = sunrise;
            document.getElementById('sunset').textContent = sunset;

            // Update forecast
            const forecastContainer = document.getElementById('forecast');
            forecastContainer.innerHTML = '';
            data.forecasts.forEach(forecast => {
                const forecastItem = document.createElement('div');
                forecastItem.classList.add('forecast-item');
                forecastItem.setAttribute('data-high', forecast.high);
                forecastItem.setAttribute('data-low', forecast.low);
                forecastItem.innerHTML = `
                    <div>${forecast.day}</div>
                    <div><i class="fas fa-${getForecastIcon(forecast.code)}"></i></div>
                    <div class="forecast-temp">${forecast.high}°F / ${forecast.low}°F</div>
                    <div>${forecast.text}</div>
                `;
                forecastContainer.appendChild(forecastItem);
            });

            // Show the weather card
            document.getElementById('weatherCard').classList.remove('d-none');

            // Update forecast temperatures on unit toggle
            updateForecastTemperatures();

        } catch (error) {
            console.error('Error fetching weather data:', error);
        }
    }

    function getForecastIcon(code) {
        // Map Yahoo weather codes to Font Awesome icons
        const iconMap = {
            0: 'sun',
            1: 'cloud-sun',
            2: 'cloud-sun',
            3: 'cloud',
            4: 'cloud',
            5: 'cloud-rain',
            6: 'cloud-showers-heavy',
            7: 'cloud-showers-heavy',
            8: 'cloud-snow',
            9: 'snowflake',
            10: 'snowflake',
            11: 'cloud-showers-heavy',
            12: 'cloud-showers-heavy',
            13: 'snowflake',
            14: 'snowflake',
            15: 'snowflake',
            16: 'snowflake',
            17: 'snowflake',
            18: 'snowflake',
            19: 'smog',
            20: 'smog',
            21: 'smog',
            22: 'smog',
            23: 'smog',
            24: 'cloud',
            25: 'cloud',
            26: 'cloud',
            27: 'cloud',
            28: 'cloud',
            29: 'cloud-showers-heavy',
            30: 'cloud-showers-heavy',
            31: 'moon',
            32: 'moon',
            33: 'moon',
            34: 'moon',
            35: 'cloud-showers-heavy',
            36: 'sun',
            37: 'thunderstorm',
            38: 'thunderstorm',
            39: 'thunderstorm',
            40: 'thunderstorm',
            41: 'snowflake',
            42: 'snowflake',
            43: 'snowflake',
            44: 'cloud',
            45: 'cloud-showers-heavy',
            46: 'snowflake',
            47: 'cloud-showers-heavy'
        };
        return iconMap[code] || 'sun';
    }

    document.getElementById('searchForm').addEventListener('submit', (event) => {
        event.preventDefault();
        const city = document.getElementById('cityInput').value.trim();
        if (city) {
            fetchWeather(city);
        }
    });

    document.getElementById('unitToggle').addEventListener('click', () => {
        isCelsius = !isCelsius;
        updateTemperatureDisplay();
        updateForecastTemperatures();
    });

    fetchWeather(); // Initial fetch
});