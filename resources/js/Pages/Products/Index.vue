<template>
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <Link
                    class="btn btn-primary"
                    href="/products/create"
                >
                    Add New
                </Link>
            </div>

        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(product, index) in (data.products.data ?? data.products)">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <a :href="product.image" target="_blank">
                            <img width="70" :src="product.image" :alt="product.name + '_img'">
                        </a>
                    </td>
                    <td>{{ product.title }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.quantity }}</td>

                    <td class="actions-cell">
                        <Link
                            :href="'/products/' + product.id"
                            class="btn btn-success btn-sm"
                        >
                            <font-awesome-icon icon="fa-eye"/>
                        </Link>

                        <Link
                            :href="'/products/' + product.id + '/edit'"
                            class="btn btn-info btn-sm text-white"
                        >
                            <font-awesome-icon icon="fa-edit"/>
                        </Link>

                        <a @click="deleteRow(product.id)" class="btn btn-danger btn-sm">
                            <font-awesome-icon icon="fa-trash"/>
                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
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
import Pagination from "../Layout/Pagination";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    data: Object,
});

let deleteRow = id => {
    if (confirm('Are your sure you want to delete this product ?')) {
        axios.delete('/products/' + id).then(response => {
            if (response.data) {
                Inertia.reload();
            }
        });
    }
};

</script>
