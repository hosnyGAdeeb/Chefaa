<template>
    <div class="card">
        <div class="card-header">
            <h1>{{ data.product.title }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <table class="">
                        <tr>
                            <td>
                                <a :href="data.product.image">
                                    <img width="120" :src="data.product.image" :alt="data.product.name + '_image'">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{ data.product.description }}</td>
                        </tr>
                        <tr>
                            <th>Price : {{ data.product.price }}</th>
                        </tr>
                        <tr>
                            <th>
                                Quantity : {{ data.product.quantity }}
                            </th>

                        </tr>
                    </table>
                </div>
                <div class="col-5 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Pharmacy Name</th>
                            <th>price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pharmacy in data.product?.pharmacies">
                            <td>{{ pharmacy.name }}</td>
                            <td>{{ pharmacy.priceInPharmacy }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    data: Object
});
</script>
