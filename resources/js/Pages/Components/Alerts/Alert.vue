<template>
    <div :class="alertClass" class="alert alert-dismissible" role="alert">
        <h4 v-if="alertTitle"
            class="alert-heading">
            {{ alertTitle }}
        </h4>
        <div class="alert-body">
            {{ alertMsg }}

            <button v-if="dismissible"
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">

            </button>
        </div>
    </div>
</template>

<script setup>


const props = defineProps({
    alertTitle: String,
    alertMsg: String,
    alertClass: String,
    dismissible: Boolean,
});

</script>
