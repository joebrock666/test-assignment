<template>
    <div class="container">
        <div class="container">
            <ul class="nav justify-content-center">
                <li>
                    <router-link :to="{ name: 'Welcome' }" class="nav-link px-2 link-dark">
                        Главная
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'Posts' }" class="nav-link px-2 link-dark">
                        Посты
                    </router-link>
                </li>
            </ul>
        </div>
        <router-view/>
    </div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
