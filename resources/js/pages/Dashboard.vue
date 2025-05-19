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
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-blue-600 dark:bg-blue-700 flex items-center justify-between p-6 shadow">
                    <div>
                        <h2 class="text-lg font-semibold text-white mb-2">Total Requests</h2>
                        <p class="text-3xl font-bold text-white">128</p>
                        <div class="mt-4">
                            <span
                                class="inline-block rounded bg-blue-100/80 px-2 py-1 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200">+12%
                                this month</span>
                        </div>
                    </div>
                    <img src="/images/request-card2.svg" alt="Requests" class="h-24 w-24 object-contain ml-4" />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div
                        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-green-600 dark:bg-green-700 flex items-center justify-between p-6 shadow">
                        <div>
                            <h2 class="text-lg font-semibold text-white mb-2">Total Quest</h2>
                            <p class="text-3xl font-bold text-white">128</p>
                            <div class="mt-4">
                                <span
                                    class="inline-block rounded bg-blue-100/80 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-blue-200">+12%
                                    this month</span>
                            </div>
                        </div>
                        <img src="/images/request-card.svg" alt="Requests" class="h-24 w-24 object-contain ml-4" />
                    </div>
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
            <div
                        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-green-600 dark:bg-green-700 flex items-center justify-between p-6 shadow">
                        <div>
                            <h2 class="text-lg font-semibold text-white mb-2">Total Admin</h2>
                            <p class="text-3xl font-bold text-white">128</p>
                            <div class="mt-4">
                                <span
                                    class="inline-block rounded bg-blue-100/80 px-2 py-1 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-blue-200">+12%
                                    this month</span>
                            </div>
                        </div>
                        <img src="/images/request-card.svg" alt="Requests" class="h-24 w-24 object-contain ml-4" />
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
