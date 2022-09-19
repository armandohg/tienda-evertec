<script setup>
import {Link} from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    secondary: {
        type: Boolean,
        default: false,
    }
});
</script>

<template>
    <Link :href="href"
          :class="[secondary ?
                'border-gray-300 text-sky-600 bg-white hover:bg-sky-50' :
                'border-transparent text-white bg-gray-500 hover:bg-sky-700'
                ]"
          class="inline-flex items-center px-3 py-2 border rounded-md shadow-sm
        text-sm text-center leading-4 font-medium tracking-wide
        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
        <slot/>
    </Link>
</template>
