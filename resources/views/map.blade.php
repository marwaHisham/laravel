<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width:100%;
         margin:200;
        padding: 0;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 70%;
        width:70%;
        
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfLH3RmzqxCKBJ2_MSsC2zjJC5lPCzUW0"></script>
    <script>
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;
       var currentLocation = window.location.href.split( '?' );

       var x=currentLocation[1].split('=');
      console.log(x[1]);
      function initialize() {
        var bangalore = { lat:30.97, lng: 31.59 };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: bangalore
        });

        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
          if(x[1]=="create"){
            
           window.location.href="/create?address="+event.latLng
          }
          else{
             var currentLocation1 = window.location.href.split( '&' );
              var id=currentLocation1[1].split( '=' );
            window.location.href="employees/"+id[1]+"/edit?address="+event.latLng
          }
              
        });
       
        // Add a marker at the center of the map.
       // addMarker(bangalore, map);
      }
      
      // Adds a marker to the map.
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body >
    <div id="map" ></div>
  </body>
</html>