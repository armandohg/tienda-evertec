<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Card from '@/Components/Card.vue';
import LinkButton from "@/Components/LinkButton.vue";
</script>

<template>
    <Head title="Evertec Tienda"/>

    <MainLayout>
        <Card class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center pt-8 sm:justify-start sm:pt-0">
                <span class="text-2xl">Producto Genérico En Bolsa</span>
                <span class="text-lg">$200.00 USD</span>
                <div class="h-48 flex justify-center">
                    <img src="/images/product_picture.jpg" class="h-full" alt=""/>
                </div>
                <LinkButton type="link" :href="route('order.create')" class="mt-4 inline-flex justify-center">Comprar</LinkButton>
            </div>
        </Card>
    </MainLayout>
</template>
