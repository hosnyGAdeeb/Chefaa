<template>

    <div class="container mb-3">
        <h1>Edit Product</h1>
    </div>

    <form-wrapper @formSubmit="submitAction">
        <div class="row">
            <div class="col">
                <InputFile
                    v-model="editForm.image"
                    name="image"
                    label="Image"
                    :error="editForm.errors.image"
                    :value="data.product?.image"
                />
            </div>
            <div class="col">
                <Input
                    v-model="editForm.title"
                    type="text"
                    name="title"
                    label="Title"
                    :error="editForm.errors.title"
                />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <Input
                    v-model="editForm.price"
                    type="text"
                    name="price"
                    label="Price"
                    :error="editForm.errors.price"
                />
            </div>
            <div class="col">
                <Input
                    v-model="editForm.quantity"
                    type="text"
                    name="quantity"
                    label="Quantity"
                    :error="editForm.errors.quantity"
                />
            </div>
        </div>
        <Textarea
            v-model="editForm.description"
            name="description"
            label="Description"
            :error="editForm.errors.description"
        />

        <PharmaciesFormSelections
            v-model="editForm.pharmacies"
            :pharmacies="data.pharmacies"
            :errors="editForm.errors"
        />

        <SubmitButton
            :processing="editForm.processing"
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
import {Inertia} from "@inertiajs/inertia";


const props = defineProps({
    data: Object
});

let editForm = useForm({
    _method: 'put',
    image: {},
    title: props.data.product?.title,
    description: props.data.product?.description,
    price: props.data.product?.price.toString(),
    quantity: props.data.product?.quantity.toString(),
    pharmacies: props.data.product?.pharmacies.map((val, index) => {
        return {
            id: val['id'].toString(),
            price: val['priceInPharmacy'].toString(),
            rowId: 'row_' + (index + 1),
        }
    }),

});

let submitAction = () => {
    editForm.post('/products/' + props.data.product?.id, {
        forceFormData: true,
        onSuccess: (response) => {
            Inertia.reload();
            $('.toast-success').toast('show');
        },
    });
};
</script>
