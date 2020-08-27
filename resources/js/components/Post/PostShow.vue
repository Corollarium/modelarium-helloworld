<template>
    <div class="modelarium-show">
        <div>
            <h1 class="formularium-viewable">
                <span class="formularium-label">
                    Title
                </span>
                <span class="formularium-value">
                    {{ model.title }}
                </span>
            </h1>
        </div>

        <div>
            <span class="formularium-viewable">
                <span class="formularium-label">
                    Content
                </span>
                <span class="formularium-value">
                    {{ model.content }}
                </span>
            </span>
        </div>

        <div>
            <span class="formularium-viewable">
                <span class="formularium-label">
                    Country
                </span>
                <span class="formularium-value">
                    {{ model.country }}
                </span>
            </span>
        </div>

        <div class="modelarium-show__buttons">
            <router-link
                :to="'/post/' + model.id + '/edit'"
                class="btn btn-primary"
            >
                <i class="fa fa-pencil"></i> Edit
            </router-link>

            <a href="#" @click.prevent="remove" class="btn btn-warning">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import itemQuery from "raw-loader!./queryItem.graphql";
import mutationDelete from "raw-loader!./mutationDelete.graphql";
import model from "./model";

export default {
    data() {
        return {
            model: model,
            can: {
                edit: true,
                delete: true,
            },
        };
    },

    created() {
        this.get(this.$route.params.id);
    },

    methods: {
        get(id) {
            axios
                .post("/graphql", {
                    query: itemQuery,
                    variables: { id },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error(result.data.errors);
                        return;
                    }
                    const data = result.data.data;
                    this.$set(this, "model", data.post);
                });
        },

        remove() {
            if (!window.confirm("Really delete?")) {
                return;
            }
            axios
                .post("/graphql", {
                    query: mutationDelete,
                    variables: { id: this.model.id },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error(result.data.errors);
                        return;
                    }
                    this.$router.push("/post/");
                });
        },
    },
};
</script>
<style></style>
