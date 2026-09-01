<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Released Certificates" />

    <AppLayout>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-6">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Monitoring</p>
                <h1 class="mt-2 text-2xl font-bold text-slate-900">Released Certificates</h1>
                <p class="mt-3 text-sm text-slate-600">The released certificate overview is ready for reporting and tracking.</p>
            </div>
        </div>
    </AppLayout>
</template>
