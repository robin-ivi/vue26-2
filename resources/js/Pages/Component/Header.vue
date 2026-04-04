<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Menu, MessageCircle, X } from 'lucide-vue-next';
import { ref } from 'vue';
import Footer from './Footer.vue';

const isOpen = ref(false);

const Toggler = () => {
    isOpen.value = !isOpen.value;
}

const logo = '/assets/img/logo.png';

</script>

<template>
    <nav class="md:flex items-center justify-between p-4 bg-white shadow w-full md:px-80">
        <div class="flex justify-between items-center">
            <img :src="logo" alt="Logo" class="h-10 w-auto">
            <Menu :class="[ isOpen ? 'hidden' : 'block', 'w-6 h-6 md:hidden' ]" @click="Toggler"/>
            <X :class="[ isOpen ? 'block' : 'hidden', 'w-6 h-6 md:hidden' ]" @click="Toggler"/>
        </div>
        <ul :class="[ isOpen ? 'flex' : 'hidden', 'md:flex md:flex-row flex-col space-x-4 px-5 pt-4 md:pt-0 md:px-0']">
            <li class="font-semibold text-md"><Link :href="route('home')">Home</Link></li>
            <li class="font-semibold text-md"><Link :href="route('about')">About</Link></li>
            <li class="font-semibold text-md"><Link :href="route('register')">Register</Link></li>
        </ul>
        <div :class="[ isOpen ? 'flex' : 'hidden', 'md:flex space-x-8 items-center px-5 md:px-0']">
            <Link href="/register" class="font-semibold text-md flex items-center gap-2"><MessageCircle class="w-4 h-4"/> +91 7651842968</Link>
            <Link href="/login" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500 font-semibold">Get Quote</Link>
        </div>
    </nav>
    <main>
        <slot></slot>
    </main>
    <Footer />
</template>