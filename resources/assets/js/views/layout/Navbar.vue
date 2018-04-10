<template>
    <nav class="navbar is-dark mb-1">
        <div id="navbarExampleTransparentExample" class="navbar-menu">
            <div class="navbar-start">
                <router-link :to="{ name: 'index' }" class="navbar-item">
                    Карта
                </router-link>

                <router-link :to="{ name: 'points.create' }" class="navbar-item">
                    Добавить точку
                </router-link>
            </div>
        </div>
    </nav>
</template>

<script>
export default {

}
</script>

<style>

</style>
