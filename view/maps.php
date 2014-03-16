<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=<?=google_api_key()?>&sensor=false">
    </script>

    <link rel="stylesheet" type="text/css" href="/public/css/main.css">
    <script src="/public/js/main.js"></script>

    <script type="text/javascript">
      $(function() {
        
        var latInput = $('input[name=lat]')
        var lngInput = $('input[name=lng]')

        var defaultLatLng = new google.maps.LatLng(52.2032406, 20.9976958);

        
        var mapOptions = {
          center: defaultLatLng,
          zoom: 18,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        var marker = new google.maps.Marker({
          position: map.getCenter(),
          map: map,
          title: 'Click to zoom'
        });

        latInput.val(defaultLatLng.lat())
        lngInput.val(defaultLatLng.lng())

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
        });

        function placeMarker(location) {
          latInput.val(location.lat())
          lngInput.val(location.lng())
          marker.setPosition(location)
}
      });
    </script>
  </head>
  <body>
    <div id="map_canvas" style="width:100%; height:100%"></div>
    <div id='finder-pane'>
      Latitude: <input type='text' name='lat'><br>
      Longitude: <input type='text' name='lng'>
    </div>
  </body>
</html>
