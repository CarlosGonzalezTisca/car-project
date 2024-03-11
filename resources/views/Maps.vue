<template>
    <div id="map"></div>
  </template>
  
  <script>
  export default {
    name: "GoogleMap",
    mounted() {
      // Cargar el mapa de Google
      this.loadGoogleMaps().then(() => {
        this.initMap();
      });
    },
    methods: {
      loadGoogleMaps() {
        return new Promise((resolve, reject) => {
          if (window.google && window.google.maps) {
            resolve();
          } else {
            const script = document.createElement("script");
            script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyCR86ZiQbIEJKuOZfIW3dNnd8hIUs8zGBc&callback=initMap`;
            script.async = true;
            script.defer = true;
            script.onerror = reject;
            window.initMap = resolve;
            document.head.appendChild(script);
          }
        });
      },
      initMap() {
        const mapOptions = {
          center: { lat: 20.659698, lng:  -103.349609 },
          zoom: 12
        };
        const map = new window.google.maps.Map(document.getElementById("map"), mapOptions);
        const marker = new window.google.maps.Marker({
          position: { lat: 20.659698, lng: -103.349609 }, 
          map: map,
          title: "GUADALAJARAGG"
        });
      }
    }
  };
  </script>
  
  <style scoped>
  #map {
    width: 100%;
    height: 400px;
  }
  </style>
  