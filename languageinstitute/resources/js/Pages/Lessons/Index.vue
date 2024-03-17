<script>
export default {
    name: 'LessonsIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";
defineProps({
    lessons: {
        type: Object,
        required: true
    }
})
const deleteLesson = id => {
    if (confirm('Are you sure?')) {
        Inertia.delete(route('lessons.destroy', id))
    }
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Lessons</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-md shadow dark:bg-gray-800">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create lesson')">
                        <Link :href="route('lessons.create')"
                            class="inline-flex items-center px-3.5 py-2.5 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-md text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Create Lesson
                        </Link>
                    </div>
                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-indigo-700">
                            <li class="flex justify-between py-5 gap-x-6" v-for="lesson in lessons.data">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="flex-auto min-w-0">
                                        <p class="font-semibold leading-6 text-gray-800 dark:text-white text-md">
                                            {{ lesson.name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <span class="inline-flex rounded-md shadow-sm isolate">
                                        <Link :href="route('lessons.edit', lesson.id)"
                                            v-if="$page.props.user.permissions.includes('update lesson')"
                                            class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-l-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">
                                        Edit
                                        </Link>
                                        <Link @click="deleteLesson(lesson.id)"
                                            v-if="$page.props.user.permissions.includes('delete lesson')"
                                            class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-semibold text-white bg-gray-800 dark:bg-white/10 rounded-r-md ring-1 ring-inset ring-gray-300 hover:bg-gray-700 dark:hover:bg-white/20 focus:z-10">
                                        Delete
                                        </Link>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-2">
                        <Link v-if="lessons.current_page > 1" :href="lessons.prev_page_url"
                            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Previous
                        </Link>
                        <div v-else></div>
                        <Link v-if="lessons.current_page < lessons.last_page" :href="lessons.next_page_url"
                            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Next
                        </Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
