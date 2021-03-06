<?php include "mapdata.php"; ?>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="leafletSlider-master/SliderControl.js"></script>
<!-- Include this library for mobile touch support  -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>

<script>
var json_data = <?php echo json_encode($data); ?>;

function init() {
  var sliderControl = null;

  var map = L.map('map', { zoomControl: false })
  .setView([41.146, -98.086], 4)
  new L.Control.Zoom({ position: 'topright' }).addTo(map);

  map.scrollWheelZoom.disable(); // disables the mouse wheel scroll...
  map.once('focus', function() { map.scrollWheelZoom.enable(); });// at least until you click once on the map
  mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
  L.tileLayer('http://a.tile.mapbox.com/v3/odorsey.jnj5k592/{z}/{x}/{y}.png', {maxZoom: 18}).addTo(map);
  map.attributionControl.setPrefix(''); // Don't show the 'Powered by Leaflet' text.

  //Introducing custom icons for status of victim (killed or injured/not killed)
  var killedIcon = L.icon({iconUrl: 'images/killed-icon.png'});
  var injuredIcon = L.icon({iconUrl: 'images/injured-icon.png'});

 //Fetch some data from a GeoJSON file

    $.getJSON("mapdata_json.php", function(json) {

		function pop(e) {
				var layer = e.target;
				layer.openPopup();
			}

			function unpop(e) {
				var layer = e.target;
				layer.closePopup();
			}

			function clickZoom(e) {
				map.setView(e.layer._latlng,16, {animate: true});
			}

        var testlayer = L.geoJson(json, {
			onEachFeature: onEachMarker
			}).on('click', clickZoom);

		  function onEachMarker(feature, layer) {
			layer.on({
				mouseover: pop,
				mouseout: unpop
				});
            layer.markerID = feature.properties.id;
            layer.bindPopup("<strong>Name:</strong> " + feature.properties.firstname + " " + feature.properties.lastname + "<br>" + "<strong>Location Details:</strong>" + " "  + feature.properties.locationDetails + "<br>" + "<strong>Date:</strong>" + " " + feature.properties.time.substring(0,10));
			layer.on({ click: slideData });

			  layer.on('click', function(e) {
					  $(".cbp-spmenu-left").animate({'left': '0%'}, 1100);
					  $("#map").animate({'width': '75%'}, 800);
					 // $("#timeline").animate({'left': '44%'}, 2000);
					 // $("#leaflet-slider").animate({'left': '44%'}, 2000);
				})
			function slideData(e){
              var slideOut = document.getElementById("cbp-spmenu-s1");
              slideOut.setAttribute("customId", feature.properties.id);
			        document.getElementById("photo").innerHTML = "<img src='" + feature.properties.photo + "'/>";
              document.getElementById("name").innerHTML = feature.properties.firstname + "&nbsp;" + feature.properties.lastname;
              document.getElementById("age").innerHTML = feature.properties.age;
              document.getElementById("gender").innerHTML = feature.properties.gender;
              document.getElementById("status").innerHTML = feature.properties.victimStatus;
              document.getElementById("vicDesc").innerHTML = feature.properties.victimDesc;
              //console.log(e);
            }
		  }

		var sliderControl = L.control.sliderControl({
        position: "bottomright",
        layer: testlayer, //attach slider to all of the markers
        range: true
      });

      //Make sure to add the slider to map
      map.addControl(sliderControl);
      //An initialize the slider
      sliderControl.startSlider();

          })
        //these are all of the markers

        var killed = L.geoJson(json, {
            filter: function(feature, layer) {
                return feature.properties.victimStatus == "Y";
            },
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: killedIcon
                })
            },
            style: function (feature) {
              return feature.properties.style;
            },
            onEachFeature: function (feature, layer) {
              layer.markerID = feature.properties.id;
              layer.bindPopup("<strong>Name:</strong> " + feature.properties.firstname + " " + feature.properties.lastname + "<br>" + "<strong>Location Details:</strong>" + " "  + feature.properties.locationDetails);
              layer.on({ click: slideData });
              function slideData(e){
                var slideOut = document.getElementById("cbp-spmenu-s1");
                slideOut.setAttribute("customId", feature.properties.id);
                document.getElementById("name").innerHTML = feature.properties.firstname + "&nbsp;" + feature.properties.lastname;
                document.getElementById("age").innerHTML = feature.properties.age;
                document.getElementById("gender").innerHTML = feature.properties.gender;
                document.getElementById("status").innerHTML = feature.properties.victimStatus;
              }
          }
        });

        var notKilled = L.geoJson(json, {
            filter: function(feature, layer) {
                return feature.properties.victimStatus == "N";
            },
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: injuredIcon
                })
            },
            style: function (feature) {
              return feature.properties.style;
            },
            onEachFeature: function (feature, layer) {
              layer.markerID = feature.properties.id;
              layer.bindPopup("<strong>ID:</strong> " + feature.properties.id + "<br>" + "<strong>Name:</strong> " + feature.properties.firstname + " " + feature.properties.lastname + "<br>" + "<strong>Location Details:</strong>" + " "  + feature.properties.locationDetails);
              layer.on({ click: slideData });

              function slideData(e){
                var slideOut = document.getElementById("cbp-spmenu-s1");
                slideOut.setAttribute("customId", feature.properties.id);
                document.getElementById("name").innerHTML = feature.properties.firstname + "&nbsp;" + feature.properties.lastname;
                document.getElementById("age").innerHTML = feature.properties.age;
                document.getElementById("gender").innerHTML = feature.properties.gender;
                document.getElementById("status").innerHTML = feature.properties.victimStatus;
              }
            }
        });

        //var all = L.layerGroup([killed, notKilled]);

    }

	/*map.on('popupclose', function(centerMarker) {
	  var cM = map.project(centerMarker.popup._latlng);
	  cM.y -= centerMarker.popup._container.clientHeight/350
	  map.setView(map.unproject(cM),13, {animate: true});
	})*/

	//Clicking on the map will reset the map as well
	/*map.on('click', function(e) {
		location.reload();
	})*/
//end of function init()

  /* This controls .cbp-spmenu-left (ie. the slide-out for the victim's bio) and slides it out of view on close */
  $(document).ready(function() {
    $('button.close.slider').add('.back').click(function() { //adding .back so that the x button has the same functionality as the back arrow
      $(".cbp-spmenu-left").animate({'left': '-45%'}, 1000);
      $("#map").animate({'width': '100%'}, 800);
     // $("#timeline").animate({'left': '0%'}, 2000);
     // $("#leaflet-slider").animate({'left': '0%'}, 2000);
    });
  });

  /* This controls .cbp-spmenu-right (ie. the slide-out for search functionality) and slides it out of view on close */
  $(document).ready(function() {
    $(".cbp-spmenu-right").click(function() {
      $(".cbp-spmenu-right").animate({'right': '0%'}, 1100);
    });
    $("#leftClose").add('.back-right').click(function() {
      $(".cbp-spmenu-right").animate({'right': '-19%'}, 1100);
    });
    $(".back-right").click(function() {
    $(".cbp-spmenu-right").animate({'right': '-19%'}, 1100);
    });
  });

  /* This controls the "Reset Map" button */
  $(document).ready(function() {
    $('nav#menu-ui.menu-ui').click(function() {
      location.reload();
    });
  });
</script>
