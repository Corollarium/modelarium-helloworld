<template>
    <div class="post-card">
        <router-link :to="link">
            {{ title }}
        </router-link>
    </div>
</template>
<script>
export default {
    props: {
        title: { type: String },
        id: { type: String, required: true },
    },
    computed: {
        link() {
            return "/post/" + this.id;
        },
    },
};
</script>
<style></style>
