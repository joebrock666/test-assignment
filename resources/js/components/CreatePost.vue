<template>
    <div class="card create-post justify-content-center">
        <form action="" @submit.prevent="submit" method="POST">
            <div class="form-group" :class="{ 'form-group--error': $v.title.$error }">
                <label class="form__label">Title</label>
                <input class="form-control" type="text" v-model.trim="$v.title.$model">
            </div>
            <div class="error" v-if="!$v.title.minLength">Title must have at least {{ $v.title.$params.minLength.min }} letters.</div>
            <div class="form-group" :class="{ 'form-group--error': $v.title.$error }">
                <label class="form__label">Description</label>
                <textarea name="" id="" cols="30" rows="10" class="form-control" v-model.trim="$v.description.$model"></textarea>
            </div>
            <div class="error" v-if="!$v.description.minLength">Your post must have at least {{ $v.description.$params.minLength.min }} letters.</div>
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
            title: '',
            description: ''
        }
    },
    mixins: [validationMixin],
    validations: {
        title: {
            required,
            minLength: minLength(5)
        },
        description: {
            required,
            minLength: minLength(20)
        },
    },
    methods: {
        submit() {
            axios.post('/api/posts/create', {title: this.title, description: this.description});
            this.$emit('update');
            this.title = '';
            this.description = '';
        }
    }
}
</script>

<style scoped>
.create-post {
    padding: 10px;
    margin-top: 20px;
}
</style>
