<template>
    <div class="h-100p flex-1 flex-column">
        <h1 class="is-size-3">Карта</h1>

        <vue-select :form="form"
                name="category_id"
                label="Категория"
                :options="this.$store.state.categories"
                keyText="title"
                keyValue="id"
                :showDefaultOption="true"></vue-select>

        <l-map :category-id="this.form.data.category_id"></l-map>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form ({
                category_id: '',
            }),
        };
    },
}
</script>

<style>

</style>
