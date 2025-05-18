<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { ref, reactive, onMounted, defineProps } from 'vue';
import axios from 'axios';

const props = defineProps<{
    appSettings: Record<string, any>;
    mode?: string;
    person?: Record<string, any>;
}>();
const CertRequest = reactive({
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
    civilstatus: null,
    status: 0,
    email: '',
    password: '',
    password_confirmation: '',
    inBryg: '',
    isValidateInformation: false,
    success: false,
});


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'All request',
        href: '/CertRequest',
    },
    {
        title: 'Create/Edit',
        href: '/CertRequest/create',
    },
];

    axios.post('/CertRequest/store', CertRequest)
        .then(response => {
            alert(response.data.message);
            CertRequest.first_name = '';
            CertRequest.middle_name = '';
            CertRequest.last_name = '';
            CertRequest.suffix = '';
            CertRequest.purok = '';
            CertRequest.barangay = props.appSettings.barangay;
            CertRequest.city = props.appSettings.city;
            CertRequest.province = props.appSettings.province;
            CertRequest.date_of_birth = '';
            CertRequest.contact_number = '';
            CertRequest.request_type = '';
            CertRequest.request_purpose = '';
            CertRequest.civilstatus = null;
            CertRequest.status = 0;
            CertRequest.email = '';

            router.visit('/CertRequest'); // Redirect to the index page after creation
            // Optionally, redirect or show a success message
        })
        .catch(error => {
            console.error('Error creating CertRequest:', error);
            alert('An error occurred while creating CertRequest.');
        });



onMounted(() => {
    if (props.mode === 'edit' && props.person) {
        CertRequest.first_name = props.person.first_name;
        CertRequest.middle_name = props.person.middle_name;
        CertRequest.last_name = props.person.last_name;
        CertRequest.suffix = props.person.suffix;
        CertRequest.purok = props.person.purok;
        CertRequest.barangay = props.person.barangay;
        CertRequest.city = props.person.city;
        CertRequest.province = props.person.province;
        CertRequest.date_of_birth = props.person.date_of_birth;
        CertRequest.contact_number = props.person.contact_number;
        CertRequest.request_type = props.person.request_type;
        CertRequest.request_purpose = props.person.request_purpose;
    }
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
    axios.post('/CertRequest-save', CertRequest)
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


    <Head title="Form" />

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
                            <input type="text" v-model="CertRequest.first_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" v-model="CertRequest.middle_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" v-model="CertRequest.last_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md text-black shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Suffix</label>
                            <input type="text" v-model="CertRequest.suffix"
                                class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" v-model="CertRequest.email" placeholder="email@domain.com"
                                class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Purok</label>
                                <input type="text" v-model="CertRequest.purok"
                                    class="mt-1 block w-full border text-black  border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Barangay</label>
                                <input type="text" v-model="CertRequest.barangay"
                                    class="mt-1 block w-full border text-black  border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" v-model="CertRequest.city"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Province</label>
                                <input type="text" v-model="CertRequest.province"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input type="date" v-model="CertRequest.date_of_birth"
                                    class="mt-1 text-black  block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Contact_number</label>
                                <input type="text" v-model="CertRequest.contact_number"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Request Type</label>
                                <select v-model="CertRequest.request_type"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="0">Certificate</option>
                                    <option value="1">Indigency</option>
                                    <option value="2">Clearance</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Request purpose</label>
                                <input type="text" v-model="CertRequest.request_purpose"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Civil Status</label>

                                <select v-model="CertRequest.civilstatus"
                                    class="mt-1 block w-full text-black  border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Widowed</option>
                                    <option value="4">Separated</option>
                                    <option value="5">Divorced</option>
                                    <option value="6">Annulled</option>
                                    <option value="7">Legally Separated</option>
                                    <option value="8">In a Relationship</option>
                                    <option value="9">Complicated</option>
                                    <option value="10">Widower</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Month/Yrs in Barangay</label>
                                <input type="text" v-model="CertRequest.inBryg"
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
