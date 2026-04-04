<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Facebook, Linkedin, Mail, Phone, Twitter, Youtube } from 'lucide-vue-next';
const logo = '/assets/img/white-logo.webp';

</script>

<template>
    <footer class="bg-[#0f1729] text-white p-6 md:px-80 py-10">
        <div class="grid grid-cols-1 md:grid-cols-4 justify-between gap-5">
            <div class="space-x-4">
                <img :src="logo" alt="Logo" class="h-12">
                <p class="text-sm mt-3 font-semibold text-[16px]">Customized travel experiences for Indian travelers,
                    international tourists, and spiritual seekers.</p>
                <div class="mt-4 flex flex-col gap-2">
                    <Link href="" class="flex items-center gap-3"><Phone class="w-4 h-4" /> +91 7651842968</Link>
                    <Link href="" class="flex items-center gap-3"><Mail class="w-4 h-4" /> info@tourtripx.com</Link>
                </div>
            </div>
            <div class="space-x-4">
                <h6 class="font-bold">Tour Packages</h6>
                <Link href="/pilgrimage" class="block mt-2 text-gray-400 font-semibold">Pilgrimage Tours Packages</Link>
                <Link href="/spiritual" class="block mt-2 text-gray-400 font-semibold">Spiritual Tours Packages</Link>
                <Link href="/heritage" class="block mt-2 text-gray-400 font-semibold">Heritage Tours Packages</Link>
                <Link href="/nature" class="block mt-2 text-gray-400 font-semibold">Nature Tours Packages</Link>
            </div>
            <div class="space-x-4">
                <h6 class="font-bold">Company</h6>
                <Link href="/about" class="block mt-2 text-gray-400 font-semibold">About Us</Link>
                <Link href="/contact" class="block mt-2 text-gray-400 font-semibold">Contact</Link>
                <Link href="/privacy" class="block mt-2 text-gray-400 font-semibold">Privacy Policy</Link>
                <Link href="/terms" class="block mt-2 text-gray-400 font-semibold">Terms of Service</Link>
            </div>
            <div class="space-x-4">
                <h6 class="font-bold">Support</h6>
                <Link href="/faq" class="block mt-2 text-gray-400 font-semibold">FAQ</Link>
                <Link href="/help" class="block mt-2 text-gray-400 font-semibold">Help Center</Link>
                <Link href="/" class="block mt-2 text-gray-400 font-semibold" preserve-scroll>Refresh</Link>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 justify-between border-t border-gray-700 mt-4 pt-5 items-center">
            <p class="text-center text-sm">© 2026 TourTripX. All rights reserved.</p>
            <div class="flex space-x-2">
                <Twitter class="w-8 h-8 rounded-4xl p-1.5 border text-white" />
                <Youtube class="w-8 h-8 rounded-4xl p-1.5 border text-white" />
                <Facebook class="w-8 h-8 rounded-4xl p-1.5 border text-white" />
                <Linkedin class="w-8 h-8 rounded-4xl p-1.5 border text-white" />
            </div>
        </div>
    </footer>
</template>