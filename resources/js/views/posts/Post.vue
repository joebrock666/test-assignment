<template>
    <div class="container post">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header">{{ post.title }}</div>

                <div class="card-body">
                    <p>{{ post.description }}</p>
                </div>
            </div>
        </div>
        <div class="comment-section justify-content-center">
            <div class="comment mt-4 text-justify" v-for="comment in post.comments">
                <h4>{{ comment.name }}</h4>
                <p>{{ comment.text }}</p>
            </div>
            <JwPagination :items="post.comments" @changePage="onChangePage" :pageSize="5"/>
            <CreateComment :id="id" @update="getData" />
        </div>
    </div>
</template>

<script>
import CreateComment from "../../components/CreateComment";
import JwPagination from 'jw-vue-pagination';

export default {
    name: "Post",
    components: { CreateComment, JwPagination },
    data() {
        return {
            post: null,
            pageOfItems: []
        }
    },
    methods: {
        getData() {
            axios.post('/api/posts', {})
                .then(res => {
                    this.post = res.data[this.$route.params.id - 1];
                })
                .catch(res => {
                    console.log(res);
                })
        },
        onChangePage(pageOfItems) {
            this.pageOfItems = pageOfItems;
        }
    },
    props: ['id', 'description', 'title', 'comments'],
    async mounted() {
        await this.getData();
    }
}
</script>

<style scoped>
.comment-section {
    margin-top: 10px;
    display: flex;
    flex-direction: column;
}
.comment {
    border: 1px solid grey;
    border-radius: 5px;
    padding: 10px 40px 10px 20px;
    margin: 0 0 20px 0;
}
.post {
    max-width: 690px;
}
</style>
