<script setup lang="ts">

const message = "Pages/About.vue";
const ddx = "bg-gradient-to-r from-blue-500 to-purple-600 h-24 w-24 mb-4";
const size = "24px";
</script>
<template>
    <div class="p-4 md:px-80">
        <h1 class="text-3xl font-bold mb-4">About Us {{ message }}</h1>
        <h2 v-bind:style="{ fontSize: size, color: 'blue' }">Hello ji</h2>
        <div v-bind:class="ddx"></div>
        <p class="text-lg mb-4">
            Welcome to DDX, your trusted partner for spiritual travel experiences across India. We are dedicated to curating unforgettable pilgrimage journeys that connect you with the rich spiritual heritage of our country.
        </p>
        <p class="text-lg mb-4">
            At DDX, we understand the importance of spiritual travel in fostering personal growth, self-discovery, and a deeper connection with the divine. Our team of experienced travel experts meticulously plans each itinerary to ensure a seamless and enriching experience for our travelers.
        </p>
    </div>

</template>