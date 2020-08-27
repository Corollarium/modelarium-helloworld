<template>
    <div class="user-card">
        <router-link :to="link">
            {{ id }}
        </router-link>
    </div>
</template>
<script>
export default {
    props: {
        id: { type: String, required: true },
    },
    computed: {
        link() {
            return "/user/" + this.id;
        },
    },
};
</script>
<style></style>
