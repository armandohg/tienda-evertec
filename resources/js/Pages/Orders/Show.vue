<script setup>
import {Head} from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Card from '@/Components/Card.vue';
import LinkButton from "@/Components/LinkButton.vue";

const props = defineProps({
    order: Object,
});
</script>

<template>
    <Head title="Detalles de orden"/>

    <MainLayout>
        <Card class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white">
                <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-8 lg:px-8">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Detalles de orden</h1>

                    <div class="mt-2 border-b border-gray-200 pb-5 text-sm sm:flex sm:justify-between">
                        <dl class="flex">
                            <dt class="text-gray-500">Número de orden</dt>
                            <dd class="ml-1 font-medium text-gray-900">{{ order.number }}</dd>
                            <dt class="ml-2">
                                <span class="text-gray-400" aria-hidden="true">&middot;</span>
                            </dt>
                            <dd class="ml-2 font-medium text-gray-900">
                                <time :datetime="order.date">{{ order.date }}</time>
                            </dd>
                        </dl>
                    </div>

                    <div class="pt-4 sm:col-span-7 sm:mt-0 md:row-end-1">
                        <h3 class="text-lg font-medium text-gray-900">
                            Producto Genérico En Bolsa
                        </h3>
                        <p class="mt-1 font-medium text-gray-900">$200.00 USD</p>
                    </div>

                    <div class="mt-4">
                        <div class="rounded-lg bg-gray-50 border border-gray-200 py-6 px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-0 lg:py-8">
                            <dl class="grid grid-cols-1 gap-6 text-sm sm:grid-cols-1 md:gap-x-8 lg:col-span-5 lg:pl-8">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900">Observaciones:</span>
                                    <span class="mt-2">{{ order.comments }}</span>
                                </div>
                            </dl>

                            <dl class="mt-8 divide-y divide-gray-200 text-sm lg:col-span-7 lg:mt-0 lg:pr-8">
                                <div class="flex items-center justify-between pb-4">
                                    <dt class="text-gray-600">Subtotal</dt>
                                    <dd class="font-medium text-gray-900">$200.00 USD</dd>
                                </div>
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-gray-600">Envío</dt>
                                    <dd class="font-medium text-gray-900">$0</dd>
                                </div>
                                <div class="flex items-center justify-between pt-4">
                                    <dt class="font-medium text-gray-900">Total</dt>
                                    <dd class="font-medium text-indigo-600">$200.00 USD</dd>
                                </div>
                            </dl>
                            <div class="mt-8 flex justify-end lg:mr-8 lg:col-span-full">
                                <LinkButton class="text-base w-full lg:max-w-fit inline-flex justify-center"
                                            :href="route('order.payment', order)"
                                            v-if="order.status !== 'paid'">
                                    <template v-if="order.status === 'rejected'">Reintentar pagar ahora</template>
                                    <template v-else>Pagar ahora</template>
                                </LinkButton>
                                <span v-else class="text-green-600 text-lg font-semibold">¡Tu orden ya está pagada!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Card>
    </MainLayout>
</template>
