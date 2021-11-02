<template>
    <div>
        <div class="alert alert-info">
            <p class="lead">
                Номер поста {{id}}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
    props: ['id']
}
</script>

<style scoped>

</style>
