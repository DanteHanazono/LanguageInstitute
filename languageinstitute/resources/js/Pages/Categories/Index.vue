<script>
export default {
    name: 'CategoriesIndex'
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { Inertia } from "@inertiajs/inertia";
defineProps({
    categories: {
        type: Object,
        required: true
    }
})
const deleteCategory = id => {
    if (confirm('Are you sure?')) {
        Inertia.delete(route('categories.destroy', id))
    }
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Categories</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="p-6 bg-white rounded-md shadow dark:bg-gray-800">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create category')">
                        <Link :href="route('categories.create')"
                            class="rounded-md bg-white/10 px-3.5 py-2.5 text-md font-semibold text-white shadow-sm hover:bg-white/20">
                        Create Category
                        </Link>
                    </div>
                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-indigo-700">
                            <li class="flex justify-between py-5 gap-x-6" v-for="category in categories.data">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="flex-auto min-w-0">
                                        <p class="font-semibold leading-6 text-white text-md">{{ category.name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <span class="inline-flex rounded-md shadow-sm isolate">
                                        <Link :href="route('categories.edit', category.id)"
                                            v-if="$page.props.user.permissions.includes('update category')"
                                            class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-l-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">
                                        Edit
                                        </Link>
                                        <Link @click="deleteCategory(category.id)"
                                            v-if="$page.props.user.permissions.includes('delete category')"
                                            class="relative inline-flex items-center px-3 py-2 -ml-px text-sm font-semibold text-white bg-white/10 rounded-r-md ring-1 ring-inset ring-gray-300 hover:bg-white/20 focus:z-10">
                                        Delete
                                        </Link>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-2">
                        <Link v-if="categories.current_page > 1" :href="categories.prev_page_url"
                            class="rounded-md bg-white/10 px-3.5 py-2.5 text-md font-semibold text-white shadow-sm hover:bg-white/20">
                        Previous
                        </Link>
                        <div v-else></div>
                        <Link v-if="categories.current_page < categories.last_page" :href="categories.next_page_url"
                            class="rounded-md bg-white/10 px-3.5 py-2.5 text-md font-semibold text-white shadow-sm hover:bg-white/20">
                        Next
                        </Link>
                        <div v-else></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
