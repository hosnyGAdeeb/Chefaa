<template>

    <div class="container mb-3">
        <h1>Add New Product</h1>
    </div>

    <form-wrapper @formSubmit="submitAction">
        <div class="row">
            <div class="col">
                <InputFile
                    v-model="createForm.image"
                    name="image"
                    label="Image"
                    :error="createForm.errors.image"
                />
            </div>
            <div class="col">
                <Input
                    v-model="createForm.title"
                    type="text"
                    name="title"
                    label="Title"
                    :error="createForm.errors.title"
                />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <Input
                    v-model="createForm.price"
                    type="text"
                    name="price"
                    label="Price"
                    :error="createForm.errors.price"
                />
            </div>
            <div class="col">
                <Input
                    v-model="createForm.quantity"
                    type="text"
                    name="quantity"
                    label="Quantity"
                    :error="createForm.errors.quantity"
                />
            </div>
        </div>
        <Textarea
            v-model="createForm.description"
            name="description"
            label="Description"
            :error="createForm.errors.description"
        />

        <PharmaciesFormSelections
            v-model="createForm.pharmacies"
            :pharmacies="data.pharmacies"
        />

        <SubmitButton
            :processing="createForm.processing"
        />

    </form-wrapper>
</template>
<script setup>
import FormWrapper from "../Layout/FormWrapper";
import Input from "../Components/Forms/Input";
import Textarea from "../Components/Forms/Textarea";
import SubmitButton from "../Components/Forms/SubmitButton";
import {useForm} from '@inertiajs/inertia-vue3'
import InputFile from "../Components/Forms/InputFile";
import PharmaciesFormSelections from "./Components/PharmaciesFormSelections";

defineProps({
    data: Object
});

let createForm = useForm({
    image: {},
    title: '',
    description: '',
    price: '',
    quantity: '',
    pharmacies: {},
});

let submitAction = () => {
    createForm.post('/products', {
        forceFormData: true,
        onSuccess: (response) => {
            // alert('hi');
        },
    });
};

</script>
