function getJsonObject(apiURL) {
  	$.ajaxSetup({
		async: false
	});
	
	var jsonObject;
	$.getJSON(apiURL+'&APPID=93144be12635c9525065fb9c851fe94d',function(json){
		jsonObject = json;
	});
	
	return jsonObject;
}

function updateOpenWeatherMapCurrentData(searchterm) {
	var apiCurrentURL = "http://api.openweathermap.org/data/2.5/weather?"+searchterm;
  	var currentWeatherData = getJsonObject(apiCurrentURL);
  	console.log(apiCurrentURL);
  	var temp = (currentWeatherData.main.temp).toFixed(1); //convert from Kelvin and round
  	var setIcon = "<img src=\"http://openweathermap.org/img/w/"+currentWeatherData.weather[0].icon+".png\">";
	$('.WP-LocalTempurature').text(temp);
	$('.WP-current-icon').html(setIcon);
	$('.WP-current-desc').text(currentWeatherData.weather[0].description);
	$('.WP-city-name').text(currentWeatherData.name);
	$('.WP-country-name').text(currentWeatherData.sys.country);
}
function citySearch() {
	var searchField = $('.WP-city-search-term').val();
	var searchUnits = $('input[name="searchUnits"]:checked').val();

	if(searchField == '') {
		searchField = $('#WP-city-search-term').text();
	}
	if(searchUnits == undefined) {
		searchUnits = $('#WP-city-search-temp').text();
	}
	if(searchUnits == '') {
		searchUnits = 'metric';
	}

	setUnits(searchUnits);
	searchTerm(searchField,searchUnits);
}

function setUnits(units) {
	if(units == "imperial") {
		$('.WP-temp-units').html('&nbsp&deg;F');
	}
	else {
  		$('.WP-temp-units').html('&nbsp&deg;C');
	}
}
function searchTerm(userSearchTerm,units) {
	var res = encodeURIComponent(userSearchTerm);
	var searchterm = "q="+res+"&units="+units;

    updateOpenWeatherMapCurrentData(searchterm);
}