<script setup>
import { ref, onMounted } from 'vue'

const bookings = ref([])     
const loading = ref(true)
const error = ref(null)

onMounted(async () => {
    try {
        const apiUrl = 'https://jsonplaceholder.typicode.com/todos' 
        const res = await fetch(apiUrl)                              
        bookings.value = await res.json() 
    } catch (err) {
        console.error('API fetch failed', err)
        error.value = 'Failed to fetch bookings'
    } finally {
        loading.value = false                                    
    }
})
</script>

<template>
    <Head title="Dashboard" />
    <div class="md:py-20 md:px-80 p-2">
        <h1>{{ $page.props.auth.user.name }}</h1>
        <h1 class="text-2xl font-bold mb-4">My Bookings</h1>

        <div v-if="loading" class="text-gray-500">Loading...</div>
        <div v-if="error" class="text-red-500">{{ error }}</div>

        <table v-if="!loading && !error" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Completed</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="booking in bookings" :key="booking.id" class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ booking.id }}</td>
                    <td class="border px-4 py-2">{{ booking.title }}</td>
                    <td class="border px-4 py-2">{{ booking.completed }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>