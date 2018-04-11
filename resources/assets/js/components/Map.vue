<template>
    <div class="flex-1 pb-1">
        <div id="map" class="h-100p"></div>
    </div>
</template>

<script>
export default {
    props: ['categoryId'],

    data() {
        return {
            map: null,
            markers: [],
        };
    },

    computed: {
        categories() {
            return this.$store.state.categories;
        },

        points() {
            return this.$store.state.points;
        }
    },
    
    mounted () {
        this.initMap();
        this.refreshMarkers();
    },

    watch: {
        categoryId() {
            this.refreshMarkers();
        }
    },

    methods: {
        initMap() {
            this.map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                subdomains: ['a','b','c']
            }).addTo(this.map);
        },

        refreshMarkers() {
            this.removeAllMarkers();

            this.markers = [];

            for (let point of this.points) {
                if (this.categoryId && this.categoryId != point.category_id) {
                    continue;
                }

                let marker = L.marker([point.lat, point.long]).bindPopup(`${point.category.title}<br>${point.created_at}`);

                this.markers.push(marker);
            }

            L.layerGroup(this.markers).addTo(this.map);
        },

        removeAllMarkers() {
            for (let marker of this.markers) {
                this.map.removeLayer(marker);
            }
        }
    }
}
</script>

<style>

</style>
