<template>
    <div class="container">
        <p>Категории: {{ categories }}</p>

        <hr>
        
        <p>Точки: {{ points }}</p>
    </div>
</template>

<script>
    export default {
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
