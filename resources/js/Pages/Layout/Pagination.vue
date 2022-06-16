<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-primary pagination-sm mt-1 justify-content-center">


            <template v-for="link in links">
                <li class="page-item" :class="link.active ? 'active' : ''" v-if="link.url">

                    <Link
                        class="page-link"
                        :href="link.url"
                        v-html="link.label"
                        preserve-scroll
                        replace
                    />


                </li>
                <li v-else class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true" v-html="link.label">
                    </a>
                </li>
            </template>

        </ul>
    </nav>
</template>

<script setup>


const props = defineProps({
    links: Object,
    meta: Object,
});

</script>
