<template>

    <div class="container mb-3">
        <h1> Edit Pharmacy</h1>
    </div>

    <form-wrapper @formSubmit="submitAction">
        <div class="row">
            <div class="col">
                <Input
                    v-model="editForm.name"
                    name="name"
                    label="Name"
                    :error="editForm.errors.name"
                />
            </div>
            <div class="col">
                <Input
                    v-model="editForm.address"
                    type="text"
                    name="address"
                    label="Address"
                    :error="editForm.errors.address"
                />
            </div>
        </div>


        <SubmitButton
            :processing="editForm.processing"
        />

    </form-wrapper>
</template>
<script setup>
import FormWrapper from "../Layout/FormWrapper";
import Input from "../Components/Forms/Input";
import SubmitButton from "../Components/Forms/SubmitButton";
import {useForm} from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";


const props = defineProps({
    data: Object
});

let editForm = useForm({
    _method: 'PUT',
    name: props.data.pharmacy?.name,
    address: props.data.pharmacy.address,
});

let submitAction = () => {
    editForm.post('/pharmacies/' + props.data.pharmacy?.id, {
        forceFormData: true,
        preserveState: true,
        onSuccess: (response) => {
            Inertia.reload();
            $('.toast-success').toast('show');
        },
    });
};
</script>
