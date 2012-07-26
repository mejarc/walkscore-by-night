//Refactor so these aren't global! get Google GeoCode, lat long
var $address = $('#address'),
	map, marker, geocoder;

function initialize() {
	//creating map
	var latlng = new google.maps.LatLng(41.659, -4.714);
	var options = {
		zoom: 16,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map_canvas'), options);

	//using geocoder
	geocoder = new google.maps.Geocoder();
	marker = new google.maps.Marker({
		map: map,
		draggable: true
	});
}
$(function() {
	initialize();

	//init the autocomplete, using jQuery UI. Refactor to use Typeahead
	$(function() {
		$address.autocomplete({
			source: function(request, response) {
				geocoder.geocode({'address': request.term, 'region': 'us'}, function(results, status) {
					response($.map(results, function(item) {
						return {
							label: item.formatted_address,
							value: item.formatted_address,
							latitude: item.geometry.location.lat(),
							longitude: item.geometry.location.lng()
						}
					}));
				})
			},
			select: function(event, ui) {
				$('#latitude').val(ui.item.latitude);
				$('#longitude').val(ui.item.longitude);
				var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
				marker.setPosition(location);
				map.setCenter(location);
			}
		});
	});
});