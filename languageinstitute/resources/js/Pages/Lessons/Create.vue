<script>
export default {
    name: 'LessonCreate'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LessonForm from '@/Components/Lessons/Form.vue';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    name: ''
})
</script>

<template>
    <AppLayout title="Create Lesson">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Create Lesson</h1>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-md shadow dark:bg-gray-800">
                    <LessonForm :form="form" @submit="form.post(route('lessons.store'))" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
