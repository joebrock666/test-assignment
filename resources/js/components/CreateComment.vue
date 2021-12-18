<template>
    <div class="card justify-content-center create-comment">
        <form action="" @submit.prevent="submit" method="POST">
            <div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
                <label class="form__label">Name</label>
                <input class="form-control" type="text" v-model.trim="$v.name.$model">
            </div>
            <div class="error" v-if="!$v.name.minLength">Name must have at least {{ $v.name.$params.minLength.min }} letters.</div>
            <div class="form-group" :class="{ 'form-group--error': $v.name.$error }">
                <label class="form__label">Comment</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control" v-model.trim="$v.text.$model"></textarea>
            </div>
            <div class="error" v-if="!$v.text.minLength">Your comment must have at least {{ $v.text.$params.minLength.min }} letters.</div>
            <input type="submit" class="btn btn-primary mb-2">
        </form>
    </div>
</template>

<script>
import {minLength, required} from "vuelidate/lib/validators";
import { validationMixin } from 'vuelidate'

export default {
    data() {
        return {
            name: '',
            text: ''
        }
    },
    mixins: [validationMixin],
    validations: {
        name: {
            required,
            minLength: minLength(4)
        },
        text: {
            required,
            minLength: minLength(10)
        },
    },
    props: ['id'],
    methods: {
        submit() {
            axios.post('/api/comments/create', {name: this.name, text: this.text, post_id: this.id});
            this.$emit('update');
            this.name = '';
            this.text = '';
        }
    }
}
</script>

<style scoped>
    .create-comment {
        padding: 10px;
        margin-top: 20px;
        max-width: 100%;
    }
</style>
