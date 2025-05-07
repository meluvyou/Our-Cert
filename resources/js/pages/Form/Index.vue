<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { reactive } from 'vue';
import axios from 'axios';
const form = reactive({
    first_name: '',
    middle_name: '',
    last_name: '',
    suffix: '',
    purok: '',
    barangay: '',
    city: '',
    province: '',
    date_of_birth: '',
    contact_number: '',
    request_type: '',
    attachment: null,
    email: '',
    password: '',
    password_confirmation: '',
});



const submit = () => {
    axios.post('/request-cert', form)
        .then(response => {
            console.log(response.data);
            // Handle success response
        })
        .catch(error => {
            console.error(error);
            // Handle error response
        });
};
</script>

<template>


    <Head title="Register" />

    <form @submit.prevent="submit">
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
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" v-model="form.middle_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" v-model="form.last_name"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Suffix</label>
                            <input type="text" v-model="form.suffix"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" placeholder="email@domain.com"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Purok</label>
                                <input type="text" v-model="form.purok"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Barangay</label>
                                <input type="text" v-model="form.barangay"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">City</label>
                                <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="">City</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Province</label>
                                <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="">Province</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input type="text" v-model="form.date_of_birth"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Contact_number</label>
                                <input type="text" v-model="form.contact_number"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Request Type</label>
                                <select v-model="form.request_type"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2">
                                    <option value="">Select Request Type</option>
                                    <option value="certification">Certification</option>
                                    <option value="clearance">Clearance</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Attachment</label>
                            <input img="picture" min="1" max="5" accept="image/*"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" />
                        </div>

                        <div class="flex items-center space-x-2">
                            <input id="billing" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded" />
                            <label for="billing" class="text-sm text-gray-700">All the information that are provided
                                are
                                true.</label>
                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md shadow hover:bg-blue-700 transition">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
