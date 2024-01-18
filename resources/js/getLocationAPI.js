
const options = {
    enableHighAccuracy: true,
    timeout: 10000,
    maximumAge: 0
};

document.addEventListener("DOMContentLoaded", () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            successPermit,
            errorPermit,
            options
        );
    }
});

function successPermit(position){
    const { latitude, longitude } = position.coords;
    getLocationDetails(latitude, longitude);
}


async function getLocationDetails(latitude, longitude) {
    await fetch(
        `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&result_type=premise&key=AIzaSyCm0X3ceS1mBnU-Vods3Vy1xSRNSPP8KlE`)
        .then((response) => response.json())
        .then((data) => {
            const {formatted_address} = data.results[0];
            const { lat, lng} = data.results[0].geometry.location;

            sessionStorage.setItem('latlng',`${lat} | ${lng}`);
            sessionStorage.setItem('location',formatted_address);

        });
}


function errorPermit(error){
    switch(error.code){
        case error.PERMISSION_DENIED:
            console.error("User denied the request for location.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.error("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            console.error('Request location timeout');
            break;
        default:
            console.error("An unknown error occurred.");
            break;
    }
}
