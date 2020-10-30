(function(window, googleMap){
  var styles = [
    // {
    //   // featureType: 'labels',
    //   elementType: 'labels',
    //   stylers: [
    //   {
    //     color: "#585858"
    //   },
    //   {gamma: 0.9}]
    // },
    {
      featureType: 'water',
      elementType: 'geometry',
      stylers: [
      {
        color: "#d8d8d8"
      }]
    },
    {
      featureType: 'landscape',
      elementType: 'geometry',
      stylers: [
      {
        color: "#ececec"
      }]
    },
    {
      featureType: 'poi',
      elementType: 'geometry',
      stylers: [
      {
        color: "#f2f2f2"
      }]
    },
    {
      featureType: 'road',
      elementType: 'geometry',
      stylers: [
      {
        color: "#ffffff"
      }]
    }];

  // map options
  var options = googleMap.MAP_OPTIONS = {
    center: {
      lat: -6.1753942,
      lng: 106.827183
    },
    // zoom: 10,
    disableDefaultUI: true,//bool value, default fasle
    scrollwheel: false, //bool value, default true
    zoomControl: false,
    draggable: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: styles
  },
  element = document.getElementById('map'),
      // map
  map = googleMap.create(element, options);
  map.zoom(16);
  
}(window, GoogleMap));
