<template>
    <nav class="formularium-pagination-wrapper" aria-label="Page navigation">
        <ul class="formularium-pagination pagination">
            <li
                class="formularium-pagination-item page-item"
                v-show="currentPage > pagesAround"
                @click="$emit('page', 1)"
            >
                <a
                    class="formularium-pagination-link page-link"
                    :href="basePath + '/1'"
                    @click.prevent=""
                >
                    1
                </a>
            </li>
            <li
                class="formularium-pagination-item page-item"
                v-show="currentPage > pagesAround"
            >
                ...
            </li>
            <li
                class="formularium-pagination-item page-item"
                v-for="p in pages"
                v-bind:key="p.page"
                @click="$emit('page', p.page)"
            >
                <a
                    v-if="p.page == currentPage"
                    class="formularium-pagination-link formularium-pagination-current page-link active"
                    :href="basePath + '/' + p.page"
                    @click.prevent=""
                >
                    {{ p.page }}
                </a>
                <a
                    v-else
                    class="formularium-pagination-link page-link"
                    :href="basePath + '/' + p.page"
                    @click.prevent=""
                >
                    {{ p.page }}
                </a>
            </li>
            <li
                class="formularium-pagination-item page-item"
                v-show="lastPage > currentPage + pagesAround"
            >
                ...
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    props: {
        basePath: {
            type: String,
            default: "/post",
        },
        currentPage: {
            type: Number,
            required: true,
        },
        perPage: {
            type: Number,
            required: true,
        },
        lastPage: {
            type: Number,
            required: true,
        },
        total: {
            type: Number,
            required: true,
        },
        pagesAround: {
            type: Number,
            default: 4,
        },
    },

    computed: {
        pages() {
            let first = Math.max(1, this.currentPage - this.pagesAround);
            let last = Math.min(
                this.lastPage,
                this.currentPage + this.pagesAround
            );
            let pages = [];
            for (let i = first; i <= last; i++) {
                pages.push({ page: i });
            }
            return pages;
        },
    },
};
</script>
