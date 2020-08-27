<template>
    <main class="modelarium-list">
        <h1 class="modelarium-list__title">Post</h1>

        <div class="modelarium-list__header">
            <router-link class="btn btn-primary" :to="'/post/edit'">
                <i class="fa fa-plus"></i> Add new
            </router-link>
        </div>

        <div class="modelarium-list__list" v-if="list.length">
            <div class="modelarium-list__filters"></div>

            <PostCard v-for="l in list" :key="l.id" v-bind="l"></PostCard>

            <div
                class="formularium-spinner spinner-border"
                role="status"
                v-if="isLoading"
            >
                <span class="sr-only">
                    Loading...
                </span>
            </div>

            <Pagination
                v-bind="pagination"
                @page="pagination.currentPage = $event"
            ></Pagination>
        </div>
        <div class="modelarium-list__empty" v-else>
            Nothing found.
        </div>
    </main>
</template>

<script>
import PostCard from "./PostCard";
import axios from "axios";
import listQuery from "raw-loader!./queryList.graphql";

export default {
    data() {
        return {
            type: "post",
            list: [],
            isLoading: false,
            pagination: {
                currentPage: 1,
                lastPage: 1,
                perPage: 20,
                lastPage: 1,
                html: "",
            },
        };
    },

    components: { PostCard: PostCard },

    created() {
        if (this.$route) {
            if (this.$route.query.page && this.$route.query.page > 1) {
                this.pagination.currentPage = this.$route.query.page;
            }
        }
        this.index(this.pagination.currentPage);
    },

    watch: {
        "pagination.currentPage": {
            handler(newVal, oldVal) {
                if (this.$route) {
                    if (this.$route.query.page != newVal) {
                        // TODO this.$router.push(this._indexURL(newVal));
                        this.index(newVal);
                    }
                }
            },
        },
    },

    methods: {
        index(page) {
            this.isLoading = true;
            axios
                .post("/graphql", {
                    query: listQuery,
                    variables: { page },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error(result.data.errors);
                        return;
                    }
                    const data = result.data.data;
                    this.$set(this, "list", data.posts.data);
                    this.$set(this, "pagination", data.posts.paginatorInfo);
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
    },
};
</script>
<style></style>
