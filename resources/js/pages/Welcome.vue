<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div> 
        <header class="not-has-[nav]:hidden mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
            <nav class="flex items-center justify-end gap-4">
                <Link v-if="page.props?.auth?.user" :href="route('dashboard')"
                    class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                </Link>
                <template v-else>
                    <Link :href="route('login')"
                    class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                    </Link>
                </template>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-pink-500 via-red-400 to-orange-400 text-white">
            <div class="container mx-auto px-6 py-20 flex flex-col-reverse md:flex-row items-center justify-between">
                <!-- Left Content -->
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <h4 class="uppercase text-sm tracking-widest mb-2">Request Certification Form</h4>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">Barangay Certification Online Request
                        System</h1>
                    <Link :href="route('certificates')"
                        class=" bg-white text-blue solid-block square-m border border-[#28140035] px-5 py-1.5 leading-normal text-black hover:border-[#1915014a] dark:border-[#3E3E3A] dark:hover:border-[#62605b]">
                    Request Certificate
                    </Link>
                </div>
                <!-- Right Image -->
                <div class="w-full md:w-1/2 mb-10 md:mb-0">
                    <img src="/images/hero.png" alt="Illustration" class="w-full max-w-md mx-auto">
                </div>
            </div>
        </section>

        <!-- Info Section -->
        <section class="py-16 px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Barangay Certification Online Request System</h2>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Request your certificate online</h3>
            <p class="text-gray-600 max-w-xl mx-auto">For future development and enhancing the society's needs. What are
                you waiting for?</p>
            <p>All rights reserved S.Y 2025-2026</p>
        </section>
    </div>
</template>