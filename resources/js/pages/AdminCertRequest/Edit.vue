<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { ref, reactive, onMounted, defineProps } from 'vue';
import axios from 'axios';

const props = defineProps({
    person: Object,
    mode: String,

});

const AllRequest = reactive({
    id: null,
    name: '',
    email: '',
    phone: '',
    request_type: '',
    request_purpose: '',
    status: '',
    action: '',
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'All Request',
        href: '/all-request',
    },
];

const createAllRequest = () => {

    if (props.mode === 'edit') {
        AllRequest.id = props.person.id;
    }

    axios.post('/all-request/store', AllRequest)
        .then(response => {

            alert(response.data.message);
            AllRequest.name = '';
            AllRequest.email = '';
            AllRequest.phone = '';
            AllRequest.request_type = '';
            AllRequest.request_purpose = '';
            AllRequest.status = '';
            AllRequest.action = '';

            router.visit('/all-request'); // Redirect to the index page after creation
            // Optionally, redirect or show a success message
        })
        .catch(error => {
            console.error('Error creating All Request:', error);
            alert('An error occurred while creating All Request.');
        });


};

onMounted(() => {
    if (props.mode === 'edit') {
        AllRequest.id = props.person.id;
        AllRequest.name = props.person.name;
        AllRequest.email = props.person.email;
        AllRequest.phone = props.person.phone;
        AllRequest.request_type = props.person.request_type;
        AllRequest.request_purpose = props.person.request_purpose;
        AllRequest.status = props.person.status;
        AllRequest.action = props.person.action;
    }
});

</script>

<template>

    <Head title="All Request" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-bold mb-4">Create Sample Crud</h1>
                        <form @submit.prevent="createAllRequest">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                <input type="text" id="name" v-model="AllRequest.name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="email" id="email" v-model="AllRequest.email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                                <input type="text" id="phone" v-model="AllRequest.phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label for="request_type" class="block text-gray-700 text-sm font-bold mb-2">Request
                                    Type:</label>
                                <input type="text" id="request_type" v-model="AllRequest.request_type"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label for="request_purpose" class="block text-gray-700 text-sm font-bold mb-2">Request
                                    Purpose:</label>
                                <input type="text" id="request_purpose" v-model="AllRequest.request_purpose"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required />
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                                <select id="status" v-model="AllRequest.status"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Rejected</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="action" class="block text-gray-700 text-sm font-bold mb-2">Action:</label>
                                <select id="action" v-model="AllRequest.action"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                    <option value="1">Approve</option>
                                    <option value="2">Decline</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ mode === 'edit' ? 'Update' : 'Create' }} Sample Crud
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
