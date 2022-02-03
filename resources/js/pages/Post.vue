<template>
    <div class="container">
        <h1>Posts</h1>
        <section class="posts d-flex flex-wrap">
            <div class="post" v-for="post in posts" :key="post.id">
                <div class="card">
                    <img :src="'/storage/' + post.image" alt />
                    <div class="card-body">
                        <h3>{{ post.name }}</h3>

                        <router-link :to="'/posts/' + post.id"
                            >View post</router-link
                        >
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            posts: null,
        };
    },
    mounted() {
        axios.get("api/posts").then((response) => {
            console.log(response);
            this.posts = response.data.data;
        });
        console.log("Component mounted.");
    },
};
</script>
