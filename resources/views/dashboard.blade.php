<!-- dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-4">Truck Location Map</h2>
                    <!-- Full-screen map container -->
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet.js JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([10.3157, 123.8854], 13); // Coordinates for Iloilo City (adjust as necessary)

        // Add a tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a marker for the truck (initial location)
        var truckMarker = L.marker([10.3157, 123.8854]).addTo(map);
        truckMarker.bindPopup("<b>Truck #1</b><br>Current Location").openPopup();

        // Function to update truck location from the backend
        function updateTruckLocation() {
            fetch('/api/getTruckLocation/1')  // Replace '1' with the actual truck ID to track
                .then(response => response.json())
                .then(data => {
                    // Ensure the latitude and longitude exist in the response
                    if (data.latitude && data.longitude) {
                        truckMarker.setLatLng([data.latitude, data.longitude]);
                        truckMarker.bindPopup("<b>Truck #1</b><br>Current Location").openPopup();
                    } else {
                        console.error('Truck location data is missing or incorrect');
                    }
                })
                .catch(error => {
                    console.error('Error fetching truck location:', error);
                });
        }

        // Update truck location every 5 seconds
        setInterval(updateTruckLocation, 5000);
    </script>
</x-app-layout>
