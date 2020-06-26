/**
 * Contact
 */
export default () => {
  const $map = document.getElementById("map");

  let map = false;

  function initMap() {
    if ($map && google) {
      map = new google.maps.Map($map, {
        center: {
          lat: Number($map.dataset.lat),
          lng: Number($map.dataset.lng)
        },
        zoom: 14,
        disableDefaultUI: true
      });

      new google.maps.Marker({
        position: {
          lat: Number($map.dataset.lat),
          lng: Number($map.dataset.lng)
        },
        map: map,
        title: "Tresorio"
      });
    }
  }

  google.maps.event.addDomListener(window, "load", initMap);
};
