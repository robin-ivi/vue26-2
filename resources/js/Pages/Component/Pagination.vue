<script lang="ts" setup>
defineProps({
   paginator: {
    type: Object,
    required: true
   }
})
</script>
<template>
    <div class="flex justify-between pt-6">
        <div>
            <Link v-for="link in paginator.links" :key="link.label" :href="link.url || ''" v-html="link.label" :class="[
                'px-3 py-1 border mx-1',
                link.active ? 'bg-blue-500 text-white' : 'bg-white', !link.url ? 'cursor-not-allowed text-gray-400' : 'hover:bg-gray-200'
            ]" />
        </div>
        <div>
            <p>Showing {{ paginator.data.length }} of {{ paginator.total }} users</p>
            <!-- <p>Showing {{ paginator.from }} to {{ paginator.to }} of {{ paginator.total }} users</p> -->
        </div>
    </div>
</template>