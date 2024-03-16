<script>
export default {
    name: 'CategoryEdit'
}
</script>
<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';

const props = defineProps({
    category: {
        type: Object,
        required: true
    }
})
const form = useForm({
    name: props.category.name
})
</script>
<template>
    <AppLayout title="Category Edit">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Edit Category</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-md shadow dark:bg-gray-800">
                    <CategoryForm :updating="true" :form="form"
                        @submit="form.put(route('categories.update', category.id))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
