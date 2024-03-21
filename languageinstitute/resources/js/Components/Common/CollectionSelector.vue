<script setup>
import { ref } from 'vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

defineProps({
    collection: {
        type: Array,
        required: true
    }
})

const currentSelection = ref(1);
const selection = ref([]);
const emit = defineEmits(['onCategories'])
const handleAddToSelection = () => {
    let alreadyExists = false
    selection.value.forEach(item => {
        if (item.id === currentSelection.value.id) {
            return alreadyExists = true;
        }
    })
    if (alreadyExists) {
        return
    }
    selection.value.push(currentSelection.value);
    emit('onCategories', selection.value)
}

const handleRemoveSelection = (index) => {
    selection.value = selection.value.filter(item => item.id !== index);
    emit('onCategories', selection.value)
}
</script>

<template>
    <div class="w-full">
        <div class="flex"> <select v-model="currentSelection"
                class="mt-1.5 w-medium rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm">
                <option v-for="(item, index) in collection" :key="index" :value="item">{{ item?.name }}</option>
            </select>
            <SecondaryButton class="mt-1.5 mr-2 ml-2" type="button" @click="handleAddToSelection">Add</SecondaryButton>
        </div>
        <div>
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="flex justify-between py-2 cursor-pointer gap-x-6" v-for="item in selection"
                    @click="handleRemoveSelection(item.id)">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex-auto min-w-0">
                            <p class="text-sm leading-6 text-gray-800 dark:text-white">
                                {{ item.name }}
                                <span class="float-right mt-0.5 ml-2 mr-2 font-semibold text-red-600">X</span>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>
