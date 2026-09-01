<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({ sales: Object });

const form = ref({ sale_date: '', amount: 0, status: 'completed', notes: '' });

function submit() {
    router.post('/sales/store', form.value);
}
</script>

<template>
    <Head title="Sales" />
    <AppLayout>
        <div class="p-4">
            <h1 class="text-2xl font-semibold mb-4">Sales</h1>

            <div class="mb-6">
                <form @submit.prevent="submit" class="grid grid-cols-4 gap-4">
                    <input v-model="form.sale_date" type="date" class="input" />
                    <input v-model="form.amount" type="number" step="0.01" class="input" placeholder="Amount" />
                    <select v-model="form.status" class="input">
                        <option value="completed">completed</option>
                        <option value="pending">pending</option>
                    </select>
                    <input v-model="form.notes" placeholder="Notes" class="input" />
                    <div class="col-span-4">
                        <button type="submit" class="btn btn-primary">Add Sale</button>
                    </div>
                </form>
            </div>

            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="sale in sales.data" :key="sale.id">
                        <td>{{ sale.sale_date }}</td>
                        <td>{{ sale.amount }}</td>
                        <td>{{ sale.status }}</td>
                        <td>{{ sale.notes }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4">
                <!-- simple pagination links if present -->
                <button v-if="sales.prev_page_url" @click="$inertia.visit(sales.prev_page_url)">Prev</button>
                <button v-if="sales.next_page_url" @click="$inertia.visit(sales.next_page_url)">Next</button>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.input { padding: 0.5rem; border: 1px solid #e5e7eb; border-radius: 0.375rem; }
.btn { padding: 0.5rem 1rem; border-radius: 0.375rem; }
.btn-primary { background-color: #2563eb; color: white; }
</style>
