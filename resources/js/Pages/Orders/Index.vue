<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Card from '@/Components/Card.vue';
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    orders: Object,
});
</script>

<template>
    <Head title="Lista de órdenes"/>

    <MainLayout>
        <Card class="max-w-fit mx-8 sm:px-6 lg:px-8">
            <div v-if="orders.data.length" class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Lista de órdenes</h1>
                    </div>
                </div>
                <div class="mt-4 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Orden</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nombre</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Correo electrónico</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Número celular</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Número de orden</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estatus</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr v-for="order in orders.data" :key="order.id">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ order.id }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ order.number }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ order.name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ order.email }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ order.phone }}</td>
                                        <td :class="'text-' + order.status_color + '-600'" class="whitespace-nowrap px-3 py-4 text-sm">{{ order.status_label }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <Link :href="route('order.show', order)" class="text-indigo-600 hover:text-indigo-900">Ver</Link>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <pagination class="col-span-full" :links="orders.links" :meta="orders.meta"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="italic">
                No hay órdenes para mostrar en este momento.
            </div>
        </Card>
    </MainLayout>
</template>
