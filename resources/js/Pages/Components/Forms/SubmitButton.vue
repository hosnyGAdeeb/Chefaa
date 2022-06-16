<template>
    <button type="submit" class="btn btn-primary btn-lg" :disabled="processing">
        Save&nbsp;<div v-if="processing" class="loader"></div>
    </button>
</template>
<script setup>
defineProps({
    processing: Boolean,
});
</script>
<style scoped>
.loader {
    border: 2px solid #f3f3f3; /* Light grey */
    border-top: 2px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 13px;
    height: 13px;
    animation: spin 2s linear infinite;
    display: inline-block;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>

