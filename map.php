<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

   
    
    <a href="index.php">Return to Index Page</a>

    <style>
        #map {
            height: 180vh;
            width: 100%;
        }

      
    </style>


</head>
<body>
    <div id="map"></div>
    
</body>

</html>



<script src="./marker.js"></script>


<script>
   var map = L.map('map').setView([38.24664020, 21.7350847], 20);
   var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
osm.addTo(map);

if (!navigator.geolocation){
    console.log("can't get current location")
} else {

 navigator.geolocation.getCurrentPosition(getPosition)
}

var latp, longp, accp, Markerp, circle;

function getPosition(position){
    
    latp = position.coords.latitude
    longp = position.coords.longitude
    accp = position.coords.accuracy

    console.log("Oi syntetagmenes sou einai: Lat " + latp ,"Long:" + longp ,"Accuracy:" +accp)
    
    Markerp = L.marker([latp, longp])
    Markerp.addTo(map) 
    circle = L.circle([latp,longp], {radius: accp }).addTo(map) 

    let featureGroup = L.featureGroup([Markerp, circle]).addTo(map)
    map.fitBounds(featureGroup.getBounds())
   

}


</script>

<script>



    // dimiourgoume ena layer, me onoma markersLayer ,me to opoio tha omadopoihsoume tous markers
     let markersLayer = L.layerGroup();
    //  prosthiki ston map
    map.addLayer(markersLayer);
   

  
var featuresLayer = L.geoJSON(data,{
    onEachFeature: function (feature, layer){
        
        layer.bindPopup("<h4> Name: " + feature.properties.name + "</h4>");
    }
});
         featuresLayer.addTo(map);
         marker.addTo(markersLayer);
        
        
        
      
</script>
