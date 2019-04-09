
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyWay</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>

  
</head>
<body>

<div style="width: 640px; height: 480px" id="mapContainer" position: absolute></div>
<script>
    // Initialize the platform object:
    var platform = new H.service.Platform({
    'app_id': 'uvdexXTn5vkJWtp4JIq5',
    'app_code': 'nqMAe4hGXAyNcFl9I2-UpA'
    });

    // Obtain the default map types from the platform object
    var maptypes = platform.createDefaultLayers();

    // Instantiate (and display) a map object:
    var map = new H.Map(
    document.getElementById('mapContainer'),
    maptypes.normal.map,
    {
      zoom: 10,
      //center: { lng: 42.52, lat: 8.32 }
      center: { lat: 42.8805199, lng: -8.5452896 }
    });
  </script>


</body>
</html>