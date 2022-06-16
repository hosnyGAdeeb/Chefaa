<template>
    <label :for="label+name" class="form-label">{{ label }}</label>
    <select class="form-select"
            :aria-label="label+name"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
    >
        <option selected>{{ label }}</option>
        <option v-for="option in options" :value="option[optionValueKey]">{{ option[optionTextKey] }}</option>
    </select>
</template>
<script setup>
defineProps({
    options: Object,
    optionValueKey: String,
    optionTextKey: String,
    name: String,
    label: String,
    modelValue: String
});
</script>
