// API Request
fetch('http://api.openweathermap.org/data/2.5/weather?zip=06511&APPID=6f30c01f41c7cdbb9086c68076ef8172')
    .then(function(response) {
        // Get the response and format it to JSON
        return response.json();
    })
    .then(function(jsonData) {
        // log the data
        console.log(jsonData);
        var lat = document.querySelector('.lat');
        var lon = document.querySelector('.lon');
        var vis = document.querySelector('.vis');

        lat.innerText = jsonData.coord.lat;
        lon.innerText = jsonData.coord.lon;
        vis.innerText = jsonData.visibility;
    });