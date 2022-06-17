<template>

    <div class="container mb-3">
        <h1>Add New Pharmacy</h1>
    </div>

    <form-wrapper @formSubmit="submitAction">
        <div class="row">
            <div class="col">
                <Input
                    v-model="createForm.name"
                    name="name"
                    label="Name"
                    :error="createForm.errors.name"
                />
            </div>
            <div class="col">
                <Input
                    v-model="createForm.address"
                    type="text"
                    name="address"
                    label="Address"
                    :error="createForm.errors.address"
                />
            </div>
        </div>


        <SubmitButton
            :processing="createForm.processing"
        />

    </form-wrapper>
</template>
<script setup>
import FormWrapper from "../Layout/FormWrapper";
import Input from "../Components/Forms/Input";
import SubmitButton from "../Components/Forms/SubmitButton";
import {useForm} from '@inertiajs/inertia-vue3'

defineProps({
    data: Object
});

let createForm = useForm({
    name: '',
    address: '',
});

let submitAction = () => {
    createForm.post('/pharmacies', {
        forceFormData: true,
        onSuccess: (response) => {
            createForm.reset();
            $('.toast-success').toast('show');
        },
    });
};
</script>
