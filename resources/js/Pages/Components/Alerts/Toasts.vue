<template>

    <div class="toast-container">

        <!--   Success Alert      -->
        <div class="toast toast-success basic-toast position-fixed top-0 end-0 m-2 fade hide text-white bg-success"
             role="alert"
             id="toast_success"
             aria-live="assertive"
             aria-atomic="true">

            <div class="toast-body">
                <h4 class="text-white text-center">
                    Data saved Successfully
                </h4>
            </div>
        </div>


    </div>

</template>
<script setup>
defineProps({
    text: String,
    bgClass: String,
    icon: String,
});
</script>
<style>
#toast_success {
    z-index: 1000000;
}
</style>
