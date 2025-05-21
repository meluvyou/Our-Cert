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
    userType: string;
}>();
const CertRequest = reactive({
    id: null,
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
    inBryg: '',
});

const isValidateInformation = ref(false);
const success = ref(false);

const breadcrumbs: BreadcrumbItem[] = [
    // ...existing code...
];

const createCertRequest = () => {
    // ...existing code...
};

onMounted(() => {
    // ...existing code...
});
</script>

<template>
    <Head title="Form" />

    <div v-if="success.value" class="min-h-screen bg-gray-100 p-8">
        <!-- ...existing code... -->
    </div>

    <form @submit.prevent="createCertRequest" v-if="!success.value">
        <div class="min-h-screen bg-gray-100 p-8">
            <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-800  b-2">Request Form</h2>
                <p class="text-gray-500 mb-6">Enter your details below for your request certificate. </p>

                <!-- User fields -->
                <div v-if="props.userType === 'user'">
                    <!-- Show only user fields -->
                    <!-- ...existing user fields... -->
                </div>

                <!-- Admin fields -->
                <div v-else-if="props.userType === 'admin'">
                    <!-- Show only admin fields or additional controls -->
                    <!-- Example: -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select v-model="CertRequest.status"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                            <option value="0">Pending</option>
                            <option value="1">Approved</option>
                            <option value="2">Rejected</option>
                        </select>
                    </div>
                    <!-- You can add more admin-only fields here -->
                </div>

                <!-- Common fields for both -->
                <div>
                    <!-- ...fields that both user and admin can see... -->
                </div>

                <div class="flex items-center space-x-2">
                    <input id="billing" v-model="isValidateInformation" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                    <label for="billing" class="text-sm text-gray-700">All the information that are provided are true.</label> 
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
    </form>
</template>