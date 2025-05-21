<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

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
                        <h2 class="text-lg font-semibold text-black mb-2">Total Requests</h2>
                        <p class="text-4xl font-bold text-black">128</p>
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
                            <h2 class="text-lg font-semibold text-black mb-2">Pending Request</h2>
                            <p class="text-4xl font-bold text-red">2</p>
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
                            <h2 class="text-lg font-semibold text-black mb-2">Total Admin</h2>
                            <p class="text-4xl font-bold text-black">4</p>
                            <div class="mt-4">
                            </div>
                        </div>
                        <img src="/images/admin.svg" alt="Requests" class="h-14 w-20 object-contain ml-2" />
                    </div>
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
