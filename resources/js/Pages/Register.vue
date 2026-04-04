<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from './Component/TextInput.vue';

const form = useForm({
    name: null,
    email: null,
    password: null,
    confirm_password: null,
});

const register = () => {
    // Handle registration logic here
    form.post(route("register"));
};

</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>
            <form @submit.prevent="register">
                <TextInput v-model="form.name" name="Name" :message="form.errors.name" />
                <TextInput v-model="form.email" name="Email" type="email" :message="form.errors.email" />
                <TextInput v-model="form.password" name="Password" type="password" :message="form.errors.password" />
                <TextInput v-model="form.confirm_password" name="Confirm Password" type="password" :message="form.errors.confirm_password" />
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-500 font-semibold" :disabled="form.processing">Register</button>
            </form>
        </div>
    </div>
</template>