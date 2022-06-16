<template>
    <div class="mb-3">
        <label :for="label+name" class="form-label">{{ label }}
            <a v-if="value" :href="value">
                <img width="30" :src="value" :alt="name + '_image'"/>
            </a>
        </label>
        <input
            class="form-control"
            type="file"
            :id="label+name"
            @input="$emit('update:modelValue', $event.target.files[0])"
        >
        <form-error :error="error"/>
    </div>
</template>
<script setup>
import FormError from "../Alerts/FormError";

const props = defineProps({
    name: String,
    label: String,
    modelValue: Object,
    error: String,
    value: String,
});

</script>
