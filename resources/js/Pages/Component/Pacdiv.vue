<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight } from 'lucide-vue-next';

defineProps<{
  title: string
  image: string
  tag?: string
}>()
</script>
<template>
    <Link href="" class="rounded-2xl shadow-lg overflow-hidden">
        <div class="relative h-48 after:content-[''] after:absolute after:inset-0 after:bg-gradient-to-t after:from-black/60 after:via-black/40 after:to-transparent">
            <img :src="image" alt="Package Image" class="w-full h-48 object-cover rounded-t-2xl">
            <span class="absolute top-2 left-2 bg-amber-500 text-white text-[12px] font-medium px-2.5 py-1.5 rounded-full z-10">
                {{ tag }}
            </span>
            <h5 class="absolute bottom-2 left-2 text-white font-bold text-lg z-10">{{ title }}</h5>
        </div>
        <div class="bg-white flex justify-between items-center p-4 py-3">
            <h5 class="text-blue-500 font-semibold">View Details</h5>
            <Link href="" class="rounded-full p-2 bg-[#0d6efd1a]">
                <ArrowRight class="w-4 h-4 text-blue-500" />
            </Link>
        </div>
    </Link>
</template>