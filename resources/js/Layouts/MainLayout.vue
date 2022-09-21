<script setup>
import {Link} from "@inertiajs/inertia-vue3";
</script>
<template>
    <div class="bg-gray-100 text-sm flex justify-end space-x-4 pt-2 pr-4">
        <Link class="text-gray-500" :href="route('welcome')">Inicio</Link>
        <Link class="text-gray-500" :href="route('order.index')">Lista de órdenes</Link>
    </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:py-10">
        <slot/>
    </div>
</template>
