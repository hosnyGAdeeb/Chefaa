<template>
    <div class="mb-3">
        <label :for="label+name" class="form-label">{{ label }}</label>
        <input
            class="form-control"
            :type="type"
            :id="label+name"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        >
        <form-error :error="error"/>
    </div>
</template>
<script setup>
import FormError from "../Alerts/FormError";

const props = defineProps({
    name: String,
    label: String,
    type: String,
    placeholder: String,
    modelValue: String,
    error: String,
});

</script>
