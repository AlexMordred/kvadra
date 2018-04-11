<template>
    <div class="field">
        <label class="label" v-text="label"></label>

        <div class="control">
            <input :type="inputType"
                class="input"
                :class="{ 'is-danger': form.errors[name] }"
                :name="name"
                v-model="form.data[name]"
                @keydown="$event.keyCode !== 13 ? form.clearErrors(name) : null;"
                :disabled="disabled"
                autocomplete="off">
        </div>

        <p class="help is-danger"
            v-if="form.errors[name]"
            v-text="form.errors[name][0]"></p>
    </div>
</template>

<script>
export default {
    props: [
        'form',
        'name',
        'label',
        'type',
        'disabled'
    ],

    data () {
        return {
            inputType: this.type ? this.type : 'text'
        };
    }
}
</script>

<style>

</style>
