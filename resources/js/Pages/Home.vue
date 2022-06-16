<template>
    <h1 class="text-center"><span class="badge bg-success">Hi There</span></h1>
    <h1 class="text-center"><span class="badge bg-success">
        Here's some statistics about our products & pharmacies
    </span></h1>


    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1>{{ data['products_count'] }} Product</h1>
                </div>
                <div class="card-footer">
                    <Link href="/products" class="btn btn-primary">Go To Products</Link>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h1>{{ data['pharmacies_count'] }} Pharmacies</h1>
                </div>
                <div class="card-footer">
                    <Link href="/pharmacies" class="btn btn-primary">Go To Pharmacies</Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    data: Object,
});
</script>
