
    <title>Fusion Tables layers</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

 <div id="map"></div>
 <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.948766, lng: -87.691497},
          zoom: 12
        });

        var layer = new google.maps.FusionTablesLayer({
          query: {
            select: 'address',
            from: '1d7qpn60tAvG4LEg4jvClZbc1ggp8fIGGvpMGzA',
            where: 'ridership > 5000'
          }
        });
        layer.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLfminQLvZltEX8k-JYWgfi0lmOn1vAXk&callback=initMap">
    </script>