function initMap() {
    const posi = { lat: 24.800, lng: 120.97 };
    const map = new google.maps.Map(document.getElementById("map"), {
	zoom: 12,
	center: posi,
    });
    const marker = new google.maps.Marker({
	position: posi,
	map: map,
    });
}
