<template>
    <div class="flex-1 pb-1">
        <div id="map" class="h-100p"></div>
    </div>
</template>

<script>
export default {
    mounted () {
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            subdomains: ['a','b','c']
        }).addTo(map);

        var marker = L.marker([51.5, -0.09]).addTo(map);
        marker.bindPopup("<b>Hello world!</b><br>I am a popup.");        
    }
}
</script>

<style>

</style>
