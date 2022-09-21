<script setup>
import {Head, useForm} from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import Card from '@/Components/Card.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    customer_name: null,
    customer_email: null,
    customer_mobile: null,
    comments: null,
});
</script>

<template>
    <Head title="Crear Orden"/>

    <MainLayout>
        <Card class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <form @submit.prevent="form.post(route('order.store'))" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                    <div>
                        <div class="mt-10">
                            <h2 class="text-lg font-medium text-gray-900">Información de contacto</h2>

                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">

                                <div class="sm:col-span-2">
                                    <label for="customer_name" class="block text-sm font-medium text-gray-700">Nombres y apellidos</label>
                                    <div class="mt-1">
                                        <input type="text" required v-model="form.customer_name" name="customer_name" id="customer_name" maxlength="80" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                    <div class="mt-1">
                                        <input type="text" required v-model="form.customer_email" name="customer_email" id="customer_email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="customer_mobile" class="block text-sm font-medium text-gray-700">Teléfono celular</label>
                                    <div class="mt-1">
                                        <input type="text" required v-model="form.customer_mobile" name="customer_mobile" id="customer_mobile" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="customer_mobile" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                    <div class="mt-1">
                                        <textarea v-model="form.comments" name="comments" id="comments" class="h-24 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="mt-10 lg:mt-0">
                        <h2 class="text-lg font-medium text-gray-900">Resumen de orden</h2>

                        <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
                            <ul role="list" class="divide-y divide-gray-200">
                                <li class="flex py-6 px-4 sm:px-6">
                                    <div class="flex-shrink-0">
                                        <img src="images/product_picture.jpg" alt="Imagen de producto" class="w-20 rounded-md"/>
                                    </div>

                                    <div class="ml-6 flex flex-1 flex-col">
                                        <div class="flex">
                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-sm">
                                                    <a :href="route('welcome')" class="font-medium text-gray-700 hover:text-gray-800">Producto Genérico En Bolsa</a>
                                                </h4>
                                                <p class="mt-1 text-sm text-gray-500">Sku PG-01</p>
                                                <p class="mt-1 text-sm text-gray-500">Tamaño: grande</p>
                                            </div>

                                        </div>

                                        <div class="flex flex-1 items-end justify-between pt-2">
                                            <p class="mt-1 text-sm font-medium text-gray-900">$200.00 USD</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Subtotal</dt>
                                    <dd class="text-sm font-medium text-gray-900">$200.00 USD</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm">Envío</dt>
                                    <dd class="text-sm font-medium text-gray-900">$0.00 USD</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                                    <dt class="text-base font-medium">Total</dt>
                                    <dd class="text-base font-medium text-gray-900">$200.00 USD</dd>
                                </div>
                            </dl>

                            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                <PrimaryButton type="submit" class="">
                                    Confirmar order
                                </PrimaryButton>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </Card>
    </MainLayout>
</template>
