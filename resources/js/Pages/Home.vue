<script setup lang="ts">
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay } from 'swiper/modules'
import { Link } from '@inertiajs/vue3';

defineProps({
    users: Object
})

// 🔥 IMPORTANT CSS
import 'swiper/css'

import Pacdiv from './Component/Pacdiv.vue';
import Pagination from './Component/Pagination.vue';


const bgImg = '/assets/img/homebanner.jpg';
const tours = [
    {
        title: 'Varanasi Spiritual Tour',
        image: '/assets/img/homebanner.jpg',
        tag: 'Popular'
    },
    {
        title: 'Rishikesh Yoga Retreat',
        image: '/assets/img/homebanner.jpg',
        tag: 'Trending'
    },
    {
        title: 'Amritsar Golden Temple Visit',
        image: '/assets/img/homebanner.jpg',
        tag: 'New'
    },
    {
        title: 'Haridwar Ganga Aarti Experience',
        image: '/assets/img/homebanner.jpg',
        tag: 'Featured'
    },
    {
        title: 'Bodh Gaya Enlightenment Tour',
        image: '/assets/img/homebanner.jpg',
        tag: 'Classic'
    },
    {
        title: 'Tirupati Balaji Darshan',
        image: '/assets/img/homebanner.jpg',
        tag: 'Must-See'
    },
    {
        title: 'Ajmer Sharif Sufi Tour',
        image: '/assets/img/homebanner.jpg',
        tag: 'Spiritual'
    },
    {
        title: 'Dwarka Krishna Pilgrimage',
        image: '/assets/img/homebanner.jpg',
        tag: 'Divine'
    }
];

const features = [
    {
        title: 'Personalized Service',
        description: 'Tailored itineraries and dedicated support for a seamless travel experience.',
        icon: '/assets/img/personalized-service.png'
    },
    {
        title: 'Expert Guides',
        description: 'Knowledgeable guides who provide deep insights into the spiritual significance of each destination.',
        icon: '/assets/img/expert-guides.png'
    },
    {
        title: 'Authentic Experiences',
        description: 'Immersive spiritual journeys that connect you with the heart of India’s sacred traditions.',
        icon: '/assets/img/authentic-experiences.png'
    },
    {
        title: 'Trusted by Thousands',
        description: 'Join a community of satisfied travelers who have experienced the magic of DDX Travel.',
        icon: '/assets/img/trusted.png'
    }
];


</script>

<template>

    <Head title="Home" />
    <section class="py-10 px-80">
        <table class="table-auto w-full">
            <thead class="border bg-amber-200">
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id" class="border">
                    <td><img :src="user.avatar ? ('storage/' + user.avatar) : ''" :alt="user.name"
                            class="w-10 h-10 rounded-full" /></td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                </tr>
            </tbody>
        </table>
        <Pagination :paginator="users" />
    </section>
    <section>
        <div class="bg-cover bg-center flex items-center justify-center relative md:h-120 h-80 p-4"
            :style="{ backgroundImage: `url(${bgImg})` }">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/60 to-black/50"></div>
            <div class="text-center text-white z-10 gap-2 flex flex-col items-center justify-center">
                <h1>{{ $page.props.user }}</h1>
                <h1 class="text-2xl md:text-5xl font-bold mb-4">India’s Trusted <span
                        class="text-amber-500">Spiritual</span> Travel Experts</h1>
                <h2 class="text-xl md:text-3xl font-semibold mb-4">Curated Pilgrimage & Spiritual Journeys Across India
                </h2>
                <p class="text-lg md:text-xl mb-8">
                    Thoughtfully planned yatras for families, senior citizens, and spiritual seekers.
                </p>
            </div>
        </div>
    </section>
    <section class="md:px-80 bg-amber-100 py-20 p-4">
        <div class="text-center py-10 pt-0">
            <h2 class="text-3xl font-bold mb-3">Explore Our Popular <span class="text-amber-600">Spiritual Tours</span>
            </h2>
            <p class="text-lg text-gray-700">Discover our most sought-after pilgrimage packages, crafted for a
                transformative spiritual experience.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <Pacdiv v-for="tour in tours.slice(0, 3)" :key="tour.title" :title="tour.title" :image="tour.image"
                :tag="tour.tag" />

        </div>
    </section>
    <section class="md:px-80 py-20 p-4">
        <div class="flex flex-col text-center pb-10 gap-2">
            <p class="text-amber-600 font-semibold uppercase">Popular Tour Categories</p>
            <h2 class="text-3xl font-bold mb-3">Discover More <span class="text-amber-600">Spiritual Journeys</span>
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <Pacdiv v-for="tour in tours" :key="tour.title" :title="tour.title" :image="tour.image" :tag="tour.tag" />
        </div>
    </section>
    <section class="md:px-80 py-20 p-4 bg-amber-50">

        <!-- Heading -->
        <div class="text-center pb-10">
            <h2 class="text-3xl font-bold">
                Why Choose <span class="text-amber-600">DDX Travel</span>
            </h2>
        </div>

        <!-- 🔥 SWIPER START -->
        <Swiper :modules="[Autoplay]" :slides-per-view="1" :space-between="20" :loop="true"
            :autoplay="{ delay: 2000, disableOnInteraction: false }" :breakpoints="{
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }" class="w-full h-60">

            <!-- Slides -->
            <SwiperSlide v-for="feature in features" :key="feature.title">
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center">

                    <img :src="feature.icon" class="w-16 h-16 mx-auto mb-4" />

                    <h3 class="text-xl font-semibold mb-2">
                        {{ feature.title }}
                    </h3>

                    <p class="text-gray-600">
                        {{ feature.description }}
                    </p>

                </div>
            </SwiperSlide>

        </Swiper>
        <!-- 🔥 SWIPER END -->

    </section>

</template>