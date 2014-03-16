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

        var latLngInputs = $('input[name=lng],input[name=lat]')

        latLngInputs.bind('change keyup', function(){
          var pos = new google.maps.LatLng(parseFloat(latInput.val()), parseFloat(lngInput.val()))
          $('.finder-pane__height').slideUp();
          map.setCenter(pos)
          marker.setPosition(pos)
        })

        var defaultLatLng = new google.maps.LatLng(52.2032406, 20.9976958);

        var mapOptions = {
          center: defaultLatLng,
          zoom: 14,
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
          $('.finder-pane__height').slideUp();
          marker.setPosition(location)
        }
        $('.finder-pane__button').click(function(){
          $('.finder-pane__height').slideDown();
        })
      });
    </script>
  </head>
  <body>
    <div id="map_canvas" style="width:100%; height:100%"></div>
    <div class='finder-pane'>
      <div class='finder-pane__inputs'>
        <label>
          <span>Latitude:</span> <input type='text' name='lat'><br>
        </label>
        <label>
          <span>Longitude:</span> <input type='text' name='lng'>
        </label>
      </div>

      <div class='finder-pane__height'>
        <div class='finder-pane__height__big'>
          1232 m.
        </div>
      </div>

      <input class='finder-pane__button' type='button' value='Check height'>

      <?=view('last5')?>

    </div>
    
  </body>
</html>
