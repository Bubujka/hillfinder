function app(){
  var map, marker
    
  // Default map position
  var lat = 52.2032406, 
      lng = 20.9976958

  // Marker icon
  var icon = '/public/img/marker.png'       

  //  ------------------------
  
  var _defaultLatLng = new google.maps.LatLng(lat, lng);

  _bind_input_actions()
  _init_map(_defaultLatLng)
  _init_marker()
  _update_inputs_values(_defaultLatLng)
  _bind_click_on_map()
  _bind_click_on_main_button()
  
  //  ------------------------
  
  function _bind_input_actions(){
    $('input[name=lng],input[name=lat]').bind('change keyup', function(){
      var pos = new google.maps.LatLng(parseFloat($('input[name=lat]').val()), parseFloat($('input[name=lng]').val()))
      $('.finder-pane__height').slideUp();
      _set_map_position(pos)
      _set_marker_position(pos)
    })

    $('input[name=lng],input[name=lat]').bind('keyup', function(event){
      if(event.keyCode == 13) // Enter key
        $('.finder-pane__button').click()
      
    })
  }

  function _init_map(pos){
    map = new google.maps.Map(
      document.getElementById("map_canvas"),
      {
        center: pos,
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP });
  }

  function _init_marker(){
    marker = new google.maps.Marker({
      position: map.getCenter(),
      map: map,
      title: 'Click to zoom',
      icon: icon
    });
  }

  function _update_inputs_values(latlng){
    $('input[name=lat]').val(latlng.lat())
    $('input[name=lng]').val(latlng.lng())
  }

  function _bind_click_on_map(){
    google.maps.event.addListener(map, 'click', function(event) {
      _update_inputs_values(event.latLng)
      _hide_height_pane()
      _set_marker_position(event.latLng)
    });
  }

  function _bind_click_on_main_button(){
    $('.finder-pane__button').click(function(){
      NProgress.start();
      $.get('/get_point_height', { latitude: marker.getPosition().lat(), longitude: marker.getPosition().lng()} ,
        function(data){
          NProgress.inc();
          _update_height_value(data)
          _update_data_block()
        });
    })
  }
  
  // -----------------------------
  
  function _hide_height_pane(){
    $('.finder-pane__height').slideUp();
  }
  function _show_height_pane(){
    $('.finder-pane__height').slideDown();
  }
  function _flash_updated_blocks(){
    $('.finder-pane__last5, .finder-pane__stats').highlight()
  }
  function _update_data_block(){
    $('.finder-pane__data_block').load('/data_block', function(){
      NProgress.done();
      _show_height_pane()
      _flash_updated_blocks()
    });
  }
  function _update_height_value(data){
    $('.finder-pane__height__big').html(data + ' m.')
  }
  function _set_marker_position(pos){
    marker.setPosition(pos)
  }
  function _set_map_position(pos){
    map.setCenter(pos)
  }
}
