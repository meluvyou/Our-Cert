<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{
    releasedCerts: Array<{
        id: number,
        name: string,
        email: string,
        request_type: string,
        date_claim: string,
        status: string,
    }>,


    totalRequests: number,
    pendingRequests: number,
    totalAdmins: number,
    // add more as needed
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white-600 dark:bg-white-700 flex items-center justify-between p-6 shadow">
                    <div>
                        <h2 class="text-lg font-semibold text-black mb-2">
                            Total Request<span v-if="totalRequests > 0"> {{ totalRequests }}</span>
                        </h2>
                        <p class="text-4xl font-bold text-black">{{ totalRequests }}</p>
                        <div class="mt-4">
                        </div>
                    </div>
                    <img src="/images/request-approved.svg" alt="Requests" class="h-12 w-20 object-contain ml-4" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div
                        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white-600 dark:bg-white-700 flex items-center justify-between p-6 shadow">
                        <div>
                            <h2 class="text-lg font-semibold text-black mb-2">
                                Pending Request<span v-if="pendingRequests > 0"> {{ pendingRequests }}</span>
                            </h2>
                            <p class="text-4xl font-bold text-red">{{ pendingRequests }}</p>
                            <div class="mt-4">
                            </div>
                        </div>
                        <img src="/images/pending.svg" alt="Requests" class="h-20 w-18 object-contain ml-4" />
                    </div>
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div
                        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white-600 dark:bg-white-700 flex items-center justify-between p-6 shadow">
                        <div>
                            <h2 class="text-lg font-semibold text-black mb-2">
                                Total Admin <span v-if="totalAdmins > 0">{{ totalAdmins }}</span>
                            </h2>
                            <p class="text-4xl font-bold text-black">{{ totalAdmins }}</p>
                            <div class="mt-4">
                            </div>
                        </div>
                        <img src="/images/admin.svg" alt="Requests" class="h-14 w-20 object-contain ml-2" />
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-lg border bg-card shadow-md dark:border-slate-700 dark:bg-slate-800">
                <table class="w-full table-auto text-left text-sm text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Requested Doc</th>
                            <th scope="col" class="px-6 py-3">Date Claimed</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cert in releasedCerts" :key="cert.id">
                            <td class="px-6 py-4">{{ cert.name }}</td>
                            <td class="px-6 py-4">{{ cert.email }}</td>
                            <td class="px-6 py-4">{{ cert.request_type }}</td>
                            <td class="px-6 py-4">{{ cert.date_claim }}</td>
                            <td class="px-6 py-4">{{ cert.status }}</td>
                        </tr>
                        <tr v-if="!releasedCerts.length">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-400">No released certificates found.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
