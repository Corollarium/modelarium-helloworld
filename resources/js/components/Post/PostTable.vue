<template>
    <main class="modelarium-table">
        <h1 class="modelarium-table__title">Post</h1>

        <div class="modelarium-table__header">
            <router-link class="btn btn-primary" :to="'/post/edit'">
                <i class="fa fa-plus"></i> Add new
            </router-link>
        </div>

        <div class="modelarium-table__container" v-if="list.length">
            <table class="formularium-table table table-striped">
                <thead class="formularium-table__head">
                    <tr class="formularium-table__headrow">
                        <th class="formularium-table__th">
                            Title
                        </th>
                        <th class="formularium-table__th">
                            Country
                        </th>
                    </tr>
                </thead>
                <tfoot class="formularium-table__foot">
                    <tr class="formularium-table__footrow">
                        <th class="formularium-table__th">
                            Title
                        </th>
                        <th class="formularium-table__th">
                            Country
                        </th>
                    </tr>
                </tfoot>
                <tbody class="formularium-table__body">
                    <PostTableItem
                        v-for="l in list"
                        :key="l.id"
                        v-bind="l"
                    ></PostTableItem>
                </tbody>
            </table>

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
        <div class="modelarium-table__empty" v-else>
            Nothing found.
        </div>
    </main>
</template>

<script>
import PostTableItem from "./PostTableItem";
import axios from "axios";
import tableQuery from "raw-loader!./queryTable.graphql";

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

    components: { PostTableItem: PostTableItem },

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
        sort(field, order) {
            // TODO
        },

        index(page) {
            this.isLoading = true;
            axios
                .post("/graphql", {
                    query: tableQuery,
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
