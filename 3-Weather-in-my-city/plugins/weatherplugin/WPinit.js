var map;

function WPinit(useGeoIP, searchBox) {
	searchBox = searchBox || ".WP-city-search-term";
	
	if(useGeoIP == true) {
		$(searchBox).val(getLocationText());
		$(searchBox).bind("enterKey",function(e){
			citySearch();
		});
		$(searchBox).keyup(function(e){
			if(e.keyCode == 13) {
				$(this).trigger("enterKey");
			}
		});
	}
	citySearch();
	setInterval(function(){ 
		citySearch();
	}, 600000); //one minute
}
function newSearch() {
	citySearch();
}
