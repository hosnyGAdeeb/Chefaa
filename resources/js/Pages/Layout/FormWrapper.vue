<template>
    <div class="form-wrapper container">
        <form @submit.prevent="submitted" :action="action">
            <slot/>
        </form>
    </div>
</template>
<script setup>
const props = defineProps({
    action: String,
});
const emit = defineEmits({
    formSubmit: Object
});

let submitted = () => {
    emit('formSubmit', true);
};

</script>
