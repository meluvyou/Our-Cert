<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
const breadcrumbs = [
    { title: 'Dashboard',
     href: '/dashboard'
    },
     
    { title: 'All Request', 
    href: '/CertRequest'
    },
    
    { title: 'All Requests'
    },
    
    { title: 'Create Request',
    href: '/CertRequest/create'
    },
    
    { title: 'Edit Request',
     href: '/CertRequest/edit'
    }

    
];


defineProps({requestCert:Array});

const onEdit = (id) => {
    router.visit(`/allreq/edit/${id}`);
};
</script> 

<template>

    <Head title="All Requests" />

   <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">All Requests</h1>
            <Link href="/CertRequest/create" class="btn btn-primary">
                Create Request</Link>
        </div>
        <div class="overflow-hidden rounded-lg border bg-card shadow-md dark:border-slate-700 dark:bg-slate-800">
            <table class="w-full table-auto text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Address</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Request_Type</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="row in requestCert" :key="row.id" class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                        <td class="px-6 py-4">{{ row.user?.name || 'N/A' }}</td>
                        <td class="px-6 py-4">{{ row.address }}</td>
                        <td class="px-6 py-4">{{ row.phone }}</td>
                        <td class="px-6 py-4">{{ row.email }}</td>
                        <td class="px-6 py-4">{{ row.request_type }}</td>
                        
                        <td class="px-6 py-4">
                            <span v-if="row.status === 'approved'" class="text-green-600">Approved</span>
                            <span v-else-if="row.status === 'pending'" class="text-yellow-600">Pending</span>
                            <span v-else class="text-red-600">Rejected</span>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>
