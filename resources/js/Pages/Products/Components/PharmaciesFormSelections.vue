<template>

    <div class="mb-3">
        <h3>
            Product Prices In Different Pharmacies
        </h3>
        <div class="row mt-3 mb-3" v-for="(index, key) in currentValue.length" :id="'row_' + index">


            <template v-if="currentValue[index - 1] !== undefined">

                <!-- Select Pharmacy -->
                <div class="col-6">
                    <Select
                        v-model="currentValue[index - 1]['id']"
                        :options="pharmacies"
                        option-text-key="name"
                        option-value-key="id"
                        name="pharmacy"
                        label="Pharmacy"
                    />

                </div>

                <!-- Add Pharmacy Price -->
                <div class="col-5">
                    <Input
                        v-model="currentValue[index - 1]['price']"
                        name="price"
                        label="Price"
                        type="text"
                    />
                </div>

                <!-- Add more button  -->
                <div class="col-1">

                    <!-- This label is for lining the add & remove buttons with inputs on the same row -->
                    <label class="form-label ">&nbsp;</label>

                    <div>
                        <a v-if="index === 1" @click.prevent="addRow('row_' + (currentValue.length + 1))"
                           class="btn btn-primary float-end">
                            <font-awesome-icon
                                icon="fa-plus"
                            />
                        </a>

                        <a v-if="index > 1" @click.prevent="removeRow('row_' + index)" class="btn btn-danger float-end">
                            <font-awesome-icon
                                icon="fa-trash"
                            />
                        </a>

                    </div>

                </div>

            </template>
        </div>


        <div class="container">
            <template v-for="(error, key) in errors">
                <div v-if="key.startsWith('pharmacies')" class="error">
                    {{ error }}
                </div>
            </template>
        </div>

    </div>
</template>
<script setup>
import {ref, watch} from "vue";
import Select from "../../Components/Forms/Select";
import Input from "../../Components/Forms/Input";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    pharmacies: Object,
    modelValue: Object,
    errors: Object,
});
const emit = defineEmits(['update:modelValue'])

const intVal = props.modelValue.length ? props.modelValue : [{id: null, price: null}];
let currentValue = ref(intVal);


let addRow = (id) => {
    currentValue.value[currentValue.value.length] = {id: "", price: "", rowId: id};
};

let removeRow = (id) => {
    const element = document.getElementById(id);
    element.remove();
    for (let key in currentValue.value) {
        if (currentValue.value[key]?.rowId === id) {
            delete currentValue.value[key];
            Inertia.reload();
            break;
        }
    }
}


watch(currentValue, value => {
    emit('update:modelValue', value.filter(Object));
}, {
    deep: true,
});

</script>
<style>
.error {
    color: red;
}
</style>
