<template>
    <div>
        <h1 class="is-size-3">Добавить точку</h1>

        <form @submit.prevent="onSubmit">

            <vue-select :form="form"
                name="category_id"
                label="Категория"
                :options="categories"
                keyText="title"
                keyValue="id"
                :showDefaultOption="true"></vue-select>

            <vue-input :form="form"
                name="lat"
                label="Широта"></vue-input>

            <vue-input :form="form"
                name="long"
                label="Долгота"></vue-input>

            <div class="control">
                <button class="button is-link"
                    :class="{ 'is-loading': form.isSubmitting }">Добавить</button>
            </div>

        </form>
    </div>
</template>

<script>
import Form from '../../utils/Form.js';

export default {
    data() {
        return {
            form: new Form ({
                category_id: '',
                lat: '',
                long: '',
            }),
        };
    },

    computed: {
        categories() {
            return this.$store.state.categories;
        },
    },

    methods: {
        onSubmit () {
            this.form.submit('post', '/points')
                .then(({data}) => {
                    this.$store.state.points.push(data);
                    
                    this.$router.push({ name: 'index' });
                });
        }
    }
}
</script>

<style>

</style>
