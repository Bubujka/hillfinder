<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <?=view('_head')?>
    <script type="text/javascript">
      $(app);
    </script>
  </head>
  <body>
    <div class='site-name'>Hill Finder</div>
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

      
      <div class='finder-pane__data_block'><?=view('last5')?><?=view('stats')?></div>

    </div>
    
  </body>
</html>
