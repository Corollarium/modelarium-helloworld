<template>
    <tr class="modelarium-list__row"></tr>
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
