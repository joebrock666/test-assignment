<template>
    <div>
        <div class="posts container">
            <div class="justify-content-center">
                <div class="col-md-12" v-for="post in pageOfItems" :key="post.id">
                    <div class="card">
                        <div class="card-header">{{ post.title }}</div>

                        <div class="card-body">
                            <p>{{ post.description }}</p>

                            <router-link
                                :to="`/posts/${post.id}`"
                            >Открыть
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <CreatePost @update="data" />
                <JwPagination :items="posts" @changePage="onChangePage" :pageSize="5"/>
            </div>
        </div>
    </div>
</template>

<script>
import CreatePost from "../../components/CreatePost";
import Post from "./Post.vue";
import JwPagination from 'jw-vue-pagination';

export default {
    name: "Posts",
    components: { CreatePost, Post, JwPagination },
    data() {
        return {
            posts: null,
            pageOfItems: []
        }
    },
    methods: {
        data() {
            axios.post('/api/posts', {})
                .then(res => {
                    this.posts = res.data;
                })
                .catch(res => {
                    console.log(res);
                })
        },
        onChangePage(pageOfItems) {
            this.pageOfItems = pageOfItems;
        }
    },
    mounted() {
        this.data();
    }
}
</script>

<style scoped>
.card {
    margin-bottom: 20px;
}
.posts {
    max-width: 690px;
}
</style>
