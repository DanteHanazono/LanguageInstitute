<script>
export default {
    name: 'CategoriesCreate'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    name: ''
})
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Create Category</h1>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-md shadow dark:bg-gray-800">
                    <CategoryForm :form="form" @submit="form.post(route('categories.store'))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
