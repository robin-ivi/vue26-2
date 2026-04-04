<script setup lang="ts">
const model = defineModel({
    type: null,
    required: true
});

defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message: {
        type: String,
        default: ''
    }
})

</script>

<template>
    <div class="mb-4">
        <label for="name" class="block text-gray-700 mb-2">{{ name }}</label>
        <input v-model="model" :type="type" :id="name"
            :class="{'border-red-500' : message, 'w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300' : true }" :required="message !== ''">
            <span class="text-red-500 text-sm" v-if="message">{{ message }}</span>
    </div>
</template>