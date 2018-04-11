<template>
    <div class="container h-100p flex-column">
        <vue-navbar></vue-navbar>

        <div class="flex-1">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import VueNavbar from './Navbar.vue';

    export default {
        components: { VueNavbar },

        computed: {
            categories() {
                return this.$store.state.categories;
            },

            points() {
                return this.$store.state.points;
            }
        },
    }
</script>
