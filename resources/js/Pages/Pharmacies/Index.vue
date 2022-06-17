<template>
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <Link
                    class="btn btn-primary"
                    href="/pharmacies/create"
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
                    <th>Name</th>
                    <th>address</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pharmacy, index) in (data.pharmacies.data ?? data.pharmacies)">
                    <td>{{ index + 1 }}</td>

                    <td>{{ pharmacy.name }}</td>
                    <td>{{ pharmacy.address }}</td>

                    <td class="actions-cell">


                        <Link
                            :href="'/pharmacies/' + pharmacy.id + '/edit'"
                            class="btn btn-info btn-sm text-white"
                        >
                            <font-awesome-icon icon="fa-edit"/>
                        </Link>

                        <a @click="deleteRow(pharmacy.id)" class="btn btn-danger btn-sm">
                            <font-awesome-icon icon="fa-trash"/>
                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <Pagination
                v-if="data.pharmacies.links"
                :links="data.pharmacies.meta.links"
                :meta="data.pharmacies.meta"
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
    if (confirm('Are your sure you want to delete this pharmacy ?')) {
        axios.delete('/pharmacies/' + id).then(response => {
            if (response.data) {
                Inertia.reload();
            }
        });
    }
};

</script>
