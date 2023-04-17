<!DOCTYPE html>
<html>

<head>
    <title>OpenStreetMap Example</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

</head>

<body>
    <div id="map" style="height: 500px; z-index:1">
        <div style="
      position:fixed;
      z-index:1000;
      background-color: white;
      padding: 10px;
      border-radius: 5px;
      right:10px;
      ">
            <h2>My position detail</h2>
            <p id="popup-content"></p>
            <p class="res">

            </p>
        </div>




        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

        <script type="module" src="{{ asset('site/js/map.js') }}"></script>
</body>

</html>