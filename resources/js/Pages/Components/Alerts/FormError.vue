<template>
    <div v-if="error" v-text="error" class="is-invalid invalid-feedback">

    </div>
</template>

<script setup>

defineProps({error: String});
</script>
<style>
.is-invalid {
    display: block;
}
</style>
