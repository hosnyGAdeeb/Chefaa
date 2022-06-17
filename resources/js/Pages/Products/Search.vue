<template>
    <div class="card">

        <div class="card-header">
            <Input
                v-model="search"
                type="text"
                name="search"
                placeholder="Search Products"
            />
        </div>

        <div class="card-body">
            <ul v-if="data.products.data.length" class="list-group">
                <Link v-for="(p, index) in data.products.data ?? data.products" :href="'/products/' + p.id">
                    <li class="list-group-item">
                        {{ p.title }}
                    </li>
                </Link>
            </ul>
        </div>

        <div class="card-footer">
            <Pagination
                v-if="data.products.links"
                :links="data.products.meta.links"
                :meta="data.products.meta"
            />
        </div>

    </div>
</template>
<script setup>
import Input from '../Components/Forms/Input';
import {ref, watch} from "vue";
import {debounce, throttle} from "lodash";
import {Inertia} from "@inertiajs/inertia";
import Pagination from "../Layout/Pagination";

const props = defineProps({
    data: Object,
});

let search = ref(props.data.filters?.search);


watch(search, throttle(function (val) {
    Inertia.get('/search', {search: search.value}, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
}, 200));

</script>
