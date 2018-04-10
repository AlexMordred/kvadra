<template>
    <div class="container">
        <vue-navbar></vue-navbar>

        <router-view></router-view>
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
