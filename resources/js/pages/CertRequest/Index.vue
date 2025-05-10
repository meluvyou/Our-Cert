<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { reactive,ref } from 'vue';
import axios from 'axios';

const props = defineProps({ appSettings: Object});
const form = reactive({
    first_name: '',
    middle_name: '',
    last_name: '',
    suffix: '',
    purok: '',
    barangay: props.appSettings.barangay,
    city: props.appSettings.city,
    province: props.appSettings.province,
    date_of_birth: '',
    contact_number: '',
    request_type: '',
    request_purpose: '',
    civilstatus: '',
    status:'',
    email: '',
    password: '',
    password_confirmation: '',
    inBryg: '',
    isValidateInformation: false,
    success: false,
});

const isValidateInformation = ref(false);
const success = ref(false);


const fileInput=ref(null);

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        const formData = new FormData();
        formData.append('file', file);
        // You can now send this formData to your server
        console.log('File uploaded:', file);
    }
};
const submit = () => {
    axios.post('/request-cert-save', form)
        .then(response => {
            success.value = true;
        })
        .catch(error => {
            success.value = false;
            console.error('Error submitting form:', error);
            console.error(error);
            // Handle error response
        });
};
</script>

<template>


    <Head title="Register" />

    <div v-if="success" class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Request Certificate</h2>
            <p class="text-gray-500 mb-6">Your request has been submitted successfully.</p>
            <p class="text-gray-500 mb-6">Please check your email for further instructions.</p>
        </div>

    </div>

    <form @submit.prevent="submit" v-if="!success">
        <div class="min-h-screen bg-gray-100 p-8">
            <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-800  b-2">Request Form</h2>
                <p class="text-gray-500 mb-6">Enter your details below for your request certificate. </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-3">
                        <h3 class="text-lg font-medium text-gray-700">Personal Details</h3>
                        <p class="text-gray-500 mb-4">Please fill in your personal information.</p>
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" v-model="form.first_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" v-model="form.middle_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" v-model="form.last_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Suffix</label>
                            <input type="text" v-model="form.suffix"
                                class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" v-model="form.email" placeholder="email@domain.com"
                                class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Purok</label>
                                <input type="text" v-model="form.purok"
                                    class="mt-1 block w-full border text-black  border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Barangay</label>
                                <input type="text" v-model="form.barangay"
                                    class="mt-1 block w-full border text-black  border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" v-model="form.city"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" v-model="form.province"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input type="date" v-model="form.date_of_birth"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Contact_number</label>
                                <input type="text" v-model="form.contact_number"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Request Type</label>
                                <select v-model="form.request_type"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="0">Certificate</option>
                                    <option value="1">Indigency</option>
                                    <option value="2">Clearance</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Request purpose</label>
                                <input type="text" v-model="form.request_purpose"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Civil Status</label>
                                <input type="text" v-model="form.civilstatus"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <input type="text" v-model="form.status"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Month/Yrs in Barangay</label>
                                <input type="text" v-model="form.inBryg"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Attachment</label>
                            <input  type="file" ref="fileInput" @change="handleFileUpload"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>

                        <div class="flex items-center space-x-2">
                            <input id="billing" v-model="isValidateInformation" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                            <label for="billing" class="text-sm text-gray-700">All the information that are provided
                                are
                                true.</label> 
                        </div>
                        <div class="pt-4">
                            <button type="submit" :disabled="!isValidateInformation"
                                :class="isValidateInformation ? 'bg-blue-600 text-white' :'bg-gray-400 text-gray-200'"
                                class="text-white px-6 py-2 rounded-md shadow-md transition">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
