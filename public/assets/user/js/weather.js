function titleCase(str) {
    str = str.split(' ');
    var length = str.length;
    for (var i = 0; i < length; i++) {
        str[i] = str[i][0].toUpperCase() + str[i].substring(1);
    }
    return str.join(' ');
}

function fullDay(str) {
    if (str === 'Tue') str = 'Tuesday';
    else if (str === 'Wed') str = 'Wednesday';
    else if (str === 'Thu') str = 'Thursday';
    else if (str === 'Sat') str = 'Saturday';
    else str = str + 'day';
    return str;
}
$(function() {

    var $wrapper = $('.wrapper'),
        $panel = $wrapper.find('.panel'),
        $city = $panel.find('#city'),
        $weather = $panel.find('.weather'),
        $group = $panel.find('.group'),
        $dt = $group.find('#dt'),
        $description = $group.find('#description'),
        $wind = $group.find('#wind'),
        $humidity = $group.find('#humidity'),
        $temperature = $weather.find('#temperature'),
        $temp = $temperature.find('#temp'),
        $icon = $temp.find('#condition'),
        $tempNumber = $temp.find('#num'),
        $celsius = $temp.find('#celsius'),
        $fahrenheit = $temp.find('#fahrenheit'),
        $forecast = $weather.find('#forecast'),
        $search = $wrapper.find('search'),
        $form = $search.find('form'),
        $button = $form.find('#button');


    /*$.ajax({
        dataType: 'json',
        url: 'http://ip-api.com/json'
      })
      .then(function(data) {
        var yourLocation = data.city + ',' + data.zip + ',' + data.countryCode;
       // getWeather(yourLocation);
        getWeather('london');

      });*/

    getWeather('ha noi,vn');

    function getWeather(input) {

        //var appid = '58b6f7c78582bffab3936dac99c31b25';
        var appid = '355c65ee382e56847dac1d7884f5f0e1';
        var requestWeather = $.ajax({
            dataType: 'json',
            url: 'http://api.openweathermap.org/data/2.5/weather',
            data: {
                q: input,
                units: 'imperial',
                appid: appid
            }
        });
        var requestForecast = $.ajax({
            dataType: 'json',
            url: 'http://api.openweathermap.org/data/2.5/forecast/daily',
            data: {
                q: input,
                units: 'imperial',
                cnt: '4',
                appid: appid
            }
        });
        $fahrenheit.addClass('active').removeAttr('href');
        $celsius.removeClass('active').attr("href", '#');
        $icon.removeClass();
        $button.removeClass().addClass('button transparent');

        requestWeather.done(function(data) {
            var weather = document.getElementById('weather');
            if (data.cod === '404') {
                $city.html('city not found');
                setBackground('color404', 'button404');
                weather.style.display = 'none';
            } else weather.style.display = '';

            var dt = new Date(data.dt * 1000).toString().split(' ');

            $city.html(data.name + ', ' + data.sys.country);
            $tempNumber.html(Math.round(data.main.temp));
            $description.html(titleCase(data.weather[0].description));
            $wind.html('Wind: ' + data.wind.speed + ' mph');
            $humidity.html('Humidity ' + data.main.humidity + '%');
            $dt.html(fullDay(dt[0]) + ' ' + dt[4].substring(0, 5));

            $celsius.on('click', toCelsius);
            $fahrenheit.on('click', toFahrenheit);

            function toCelsius() {
                $(this).addClass('active').removeAttr('href');
                $fahrenheit.removeClass('active').attr('href', '#');
                $tempNumber.html(Math.round((data.main.temp - 32) * (5 / 9)));
            }

            function toFahrenheit() {
                $(this).addClass('active').removeAttr('href');
                $celsius.removeClass('active').attr("href", '#');
                $tempNumber.html(Math.round(data.main.temp));
            }

            function setBackground(background, button) {
                $('#weather-wrapper').removeClass().addClass(background);
                $button.off().hover(function() {
                    $(this).removeClass('transparent').addClass(button);
                }, function() {
                    $(this).removeClass().addClass('button transparent');
                });
            }

            if (data.main.temp >= 80) setBackground('hot', 'button-hot');
            else if (data.main.temp >= 70) setBackground('warm', 'button-warm');
            else if (data.main.temp >= 60) setBackground('cool', 'button-cool');
            else setBackground('cold', 'button-cold');

            switch (data.weather[0].icon) {
                case '01d':
                    $icon.addClass('wi wi-day-sunny');
                    break;
                case '02d':
                    $icon.addClass('wi wi-day-sunny-overcast');
                    break;
                case '01n':
                    $icon.addClass('wi wi-night-clear');
                    break;
                case '02n':
                    $icon.addClass('wi wi-night-partly-cloudy');
                    break;
            }

            switch (data.weather[0].icon.substr(0, 2)) {
                case '03':
                    $icon.addClass('wi wi-cloud');
                    break;
                case '04':
                    $icon.addClass('wi wi-cloudy');
                    break;
                case '09':
                    $icon.addClass('wi wi-showers');
                    break;
                case '10':
                    $icon.addClass('wi wi-rain');
                    break;
                case '11':
                    $icon.addClass('wi wi-thunderstorm');
                    break;
                case '13':
                    $icon.addClass('wi wi-snow');
                    break;
                case '50':
                    $icon.addClass('wi wi-fog');
                    break;
            }
        });


        requestForecast.done(function(data) {

            $celsius.on('click', toCelsius);
            $fahrenheit.on('click', toFahrenheit);
            $("#container_weatherchart").addClass("chart-size");

            $('#weatherChart').remove(); // this is my <canvas> element
            $('#container_weatherChart').append('<canvas id="weatherChart"><canvas>');
            var ctx = $("#weatherChart").get(0).getContext("2d");
            $('#weatherChart').width(500).height(300);
            var forecast = [];
            var length = data.list.length;
            var date = [],
                humidity  = [],
                temp = [],
                borderColor = [],
                backgroundColor = [];

            for (var i = 0; i < length; i++) {
                date.push(new Date(data.list[i].dt * 1000).toString().split(' ')[0]);
                temp.push(data.list[i].temp.day);
                humidity .push(data.list[i].humidity);
                backgroundColor.push('rgba(255, 255, 255, 0.2)');
                borderColor.push('rgba(255, 255, 255, 1)');
                forecast.push({
                    date: new Date(data.list[i].dt * 1000).toString().split(' ')[0],
                    fahrenheit: {
                        high: Math.round(data.list[i].temp.max),
                        low: Math.round(data.list[i].temp.min),
                    },
                    celsius: {
                        high: Math.round((data.list[i].temp.max - 32) * (5 / 9)),
                        low: Math.round((data.list[i].temp.min - 32) * (5 / 9))
                    }
                });
            }
            backgroundColor[0] = 'rgba(0, 255, 255, 0.2)';
            myPieChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'Humidity',
                        data: humidity,
                        backgroundColor: backgroundColor,
                        borderColor: borderColor,
                        borderWidth: 1,
                    } , 
                    {
                        label: 'Temperature',
                        data: temp,
                        type: 'line',
                        borderColor:'rgba(255, 0, 0, 1)',                        
                        borderWidth: 2,
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#fff'

                            },
                            
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff'

                            },
                            
                        }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#fff',
                        }
                    }
                }
            });

            function toCelsius() {
                doForecast('celsius');
            }

            function toFahrenheit() {
                doForecast('fahrenheit');
            }

            function doForecast(unit) {
                var arr = [];
                var length = forecast.length;
                for (var i = 0; i < length; i++) {
                    arr[i] = ("<div class='block-weather'><h3 class='secondary'>" + forecast[i].date + "</h3><h2 class='high'>" + forecast[i][unit].high + "</h2><h4 class='secondary'>" + forecast[i][unit].low + "</h4></div>");
                }
                $forecast.html(arr.join(''));
            }

            doForecast('fahrenheit');
        });
    }
    $form.submit(function(event) {
        var input = document.getElementById('search').value;
        var inputLength = input.length;
        if (inputLength) getWeather(input);
        event.preventDefault();
    });
});