<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';
import TextInput from './Component/TextInput.vue';
import { route } from 'ziggy-js';
const form = useForm({
    email: null,
    password: null,
})

const login = () => {
    form.post(route("login"));
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login to Your Account</h2>
            <form @submit.prevent="login">
                <TextInput v-model="form.email" name="Email" type="email" :message="form.errors.email" />
                <TextInput v-model="form.password" name="Password" type="password" :message="form.errors.password" />
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-500 font-semibold"
                    :disabled="form.processing">Login</button>
            </form>
            <a :href="route('google')" class="w-full mt-4 bg-red-600 text-white py-2 rounded-md hover:bg-red-500 font-semibold text-center block">Login with Google</a>
            <p class="mt-4 text-center text-gray-600">Don't have an account? <Link :href="route('register')" class="text-blue-600 hover:underline">Register here</Link></p>
        </div>
    </div>
</template>