<script setup lang="ts">
import { ref } from 'vue';
const message = "Pages/About.vue";
const ddx = "bg-gradient-to-r from-blue-500 to-purple-600 h-24 w-24 mb-4";
const size = "24px";
const inCount = ref(0);
const bulb = "/assets/img/img_lightBulb.svg";
const lightOn = ref(false);
const ttcv = ref("");
const text = ref("");
const xPos = ref(0);
const ctext = (event: MouseEvent) => {
    const x = event.offsetX;
    const y = event.offsetY;
    text.value = `X: ${x}, Y: ${y}`;
    xPos.value = x;
}

const addMouse = (num: number) => {
    inCount.value += num;
}

const messages = ref<string>('');

const myMethod = (event: MouseEvent, msg: string) => {
    const id = (event.currentTarget as HTMLElement).id
    messages.value = `${msg} ${id}`
}

</script>
<template>
    <div class="p-4 md:px-80">
        <h1 class="text-3xl font-bold mb-4">About Us {{ message }}</h1>
        <h2 v-bind:style="{ fontSize: size, color: 'blue' }">Hello ji</h2>
        <div v-bind:class="ddx"></div>
        <input v-on:input="inCount++">
        <h3>{{ +inCount }}</h3>
        <input type="text" v-model="ttcv">
        <p>{{ ttcv }}</p>
        <p class="text-lg mb-4">
            Welcome to DDX, your trusted partner for spiritual travel experiences across India. We are dedicated to
            curating unforgettable pilgrimage journeys that connect you with the rich spiritual heritage of our country.
        </p>
        <p class="text-lg mb-4">
            At DDX, we understand the importance of spiritual travel in fostering personal growth, self-discovery, and a
            deeper connection with the divine. Our team of experienced travel experts meticulously plans each itinerary
            to ensure a seamless and enriching experience for our travelers.
        </p>
        <div class="border border-dashed inline-block border-black-400 rounded">
            <div id="lightDiv" class="relative w-[150px] h-[150px]">
                <div v-show="lightOn" class="absolute top-[10%] left-[10%] w-[80%] h-[80%] rounded-full bg-yellow-300">
                </div>
                <img :src="bulb" alt="Light Bulb" class="relative w-full">
            </div>
            <button @click="lightOn = !lightOn"
                class="block mx-auto border m-3 p-1 rounded cursor-pointer bg-gray-700 text-white px-3 hover:bg-gray-600">Switch
                light</button>
        </div>

        <div v-on:mousemove="ctext" v-bind:style="{ background: 'hsl(' + xPos + ', 100%, 50%)' }"
            class="w-[200px] h-[200px] border border-dashed border-gray-400 rounded flex items-center justify-center">
            {{ text }}
        </div>
        <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
            v-on:click="addMouse(5)">+5</button>
        {{ inCount }}
        <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600"
            v-on:click="addMouse(-5)">-5</button>
        <div class="w-50 h-50 bg-amber-700" id="All" v-on:click="myMethod($event, 'Hello')">
            {{ messages }}
        </div>
    </div>
</template>