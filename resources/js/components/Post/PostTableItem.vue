<template>
    <tr class="modelarium-list__row">
        <td>{{ title }}</td>
        <td>{{ country }}</td>
    </tr>
</template>
<script>
export default {
    props: {
        title: { type: String },
        country: { type: String },
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
