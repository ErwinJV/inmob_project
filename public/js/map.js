
const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

let myMap = L.map('myMap').setView([10.6417, -71.6295  ], 13)

L.tileLayer(tilesProvider, {
  
  maxZoom: 18

}).addTo(myMap)


