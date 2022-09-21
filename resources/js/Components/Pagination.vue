<template>
    <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-xs text-gray-700">
                Mostrando
                {{ ' ' }}
                <span class="font-medium">{{ meta.from }}</span>
                {{ ' ' }}
                a
                {{ ' ' }}
                <span class="font-medium">{{ meta.to }}</span>
                {{ ' ' }}
                de
                {{ ' ' }}
                <span class="font-medium">{{ meta.total }}</span>
                {{ ' ' }}
                órdenes
            </p>
        </div>
        <div class="flex flex-1 justify-between sm:justify-end">
            <a :href="links.prev" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a :href="links.next" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
    </nav>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    links: Object,
    meta: Object,
});
</script>
