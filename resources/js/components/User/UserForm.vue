<template>
    <form class="modelarium-form" method="POST" @submit.prevent="save">
        <div
            class="form-group"
            data-attribute="name"
            data-datatype="string"
            data-basetype="string"
        >
            <input
                id="name16"
                type="text"
                name="name"
                class="form-control"
                data-attribute="name"
                data-datatype="string"
                data-basetype="string"
                maxlength="1024"
                title=""
                required="required"
                v-model="model.name"
            />
        </div>

        <div
            class="form-group"
            data-attribute="password"
            data-datatype="string"
            data-basetype="string"
        >
            <input
                id="password17"
                type="text"
                name="password"
                class="form-control"
                data-attribute="password"
                data-datatype="string"
                data-basetype="string"
                maxlength="1024"
                title=""
                required="required"
                v-model="model.password"
            />
        </div>

        <div
            class="form-group"
            data-attribute="email_verified_at"
            data-datatype="timestamp"
            data-basetype="datetime"
        >
            <input
                id="email_verified_at18"
                type="datetime"
                name="email_verified_at"
                class="form-control"
                data-attribute="email_verified_at"
                data-datatype="timestamp"
                data-basetype="datetime"
                maxlength="1024"
                title=""
                v-model="model.email_verified_at"
            />
        </div>

        <div
            class="form-group"
            data-attribute="email"
            data-datatype="email"
            data-basetype="string"
        >
            <input
                id="email19"
                type="email"
                name="email"
                class="form-control"
                data-attribute="email"
                data-datatype="email"
                data-basetype="string"
                maxlength="1024"
                title=""
                required="required"
                v-model="model.email"
            />
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
</template>

<script>
import axios from "axios";
import mutationUpsert from "raw-loader!./mutationUpsert.graphql";
import itemQuery from "raw-loader!./queryItem.graphql";
import model from "./model";

export default {
    data() {
        return {
            model: model,
        };
    },

    created() {
        if (this.$route.params.id) {
            this.get(this.$route.params.id);
        }
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

        save() {
            let postData = { ...this.model };
            let query;

            axios
                .post("/graphql", {
                    query: mutationUpsert,
                    variables: { user: postData },
                })
                .then((result) => {
                    if (result.data.errors) {
                        // TODO
                        console.error("errors", result.data.errors);
                        return;
                    }
                    const data = result.data.data;
                    this.$router.push("/user/" + data.upsertUser.id);
                });
        },

        changedFile(name, event) {
            // TODO
        },
    },
};
</script>
<style></style>
