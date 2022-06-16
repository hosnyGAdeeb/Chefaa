<template>
    <div class="mb-3">
        <label :for="label+name" class="form-label">
            {{ label }}
        </label>
        <textarea
            class="form-control"
            :name="name"
            :id="label+name"
            v-text="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"></textarea>

        <form-error :error="error"/>
    </div>
</template>
<script setup>
import FormError from "../Alerts/FormError";

const props = defineProps({
    name: String,
    label: String,
    modelValue: String,
    error: String,

});
</script>
