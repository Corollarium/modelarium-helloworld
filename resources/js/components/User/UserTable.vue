<template>
    <main class="modelarium-table">
        <h1 class="modelarium-table__title">User</h1>

        <div class="modelarium-table__header">
            <router-link class="btn btn-primary" :to="'/user/edit'">
                <i class="fa fa-plus"></i> Add new
            </router-link>
        </div>

        <div class="modelarium-table__container" v-if="list.length">
            <table class="formularium-table table table-striped">
                <thead class="formularium-table__head">
                    <tr class="formularium-table__headrow"></tr>
                </thead>
                <tfoot class="formularium-table__foot">
                    <tr class="formularium-table__footrow"></tr>
                </tfoot>
                <tbody class="formularium-table__body">
                    <UserTableItem
                        v-for="l in list"
                        :key="l.id"
                        v-bind="l"
                    ></UserTableItem>
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
import UserTableItem from "./UserTableItem";
import axios from "axios";
import tableQuery from "raw-loader!./queryTable.graphql";

export default {
    data() {
        return {
            type: "user",
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

    components: { UserTableItem: UserTableItem },

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
                    this.$set(this, "list", data.users.data);
                    this.$set(this, "pagination", data.users.paginatorInfo);
                })
                .finally(() => {
                    this.isLoading = false;
                });
        },
    },
};
</script>
<style></style>
