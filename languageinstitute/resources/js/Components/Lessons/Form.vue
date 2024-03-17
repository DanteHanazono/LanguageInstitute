<script>
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import CollectionSelector from '@/Components/Common/CollectionSelector.vue';

export default {
    name: 'LessonsForm',
    components: {
        FormSection,
        PrimaryButton,
        InputError,
        InputLabel,
        TextInput,
        SecondaryButton,
    },
    props: {
        form: {
            type: Object,
            required: true,
        },
        updating: {
            type: Boolean,
            required: false,
            default: false,
        },
        categories: {
            type: Object,
            required: true
        },
        levels: {
            type: Object,
            required: true
        }
    },
    emits: ['submit'],
};
</script>
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update Lesson' : 'Create New Lesson' }}
        </template>
        <template #description>
            {{ updating ? 'Update selected lesson' : "Let's create a new one." }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2" />

                <InputLabel class="mt-2" for="description" value="Description" />
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.description" class="mt-2" />

                <InputLabel class="mt-2" for="content_url" value="Content Url" />
                <TextInput id="content_url" v-model="form.conten_url" type="text" autocomplete="content_url"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.content_url" class="mt-2" />

                <InputLabel class="mt-2" for="pdf_url" value="PDF File" />
                <SecondaryButton class="mt-2 mr-2" type="button" @click="">Upload PDF </SecondaryButton>
                <InputError :message="$page.props.errors.pdf_url" class="mt-2" />

                <InputLabel class="mt-2" for="level_id" value="Select Level" />
                <select
                    class="mt-1.5 w-small rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 sm:text-sm"
                    name="level_id" id="level_id">
                    <option v-for="level in levels" value="level.id">{{ level.name }}</option>
                </select>
                <InputError :message="$page.props.errors.level_id" class="mt-2" />

                <InputLabel class="mt-2" for="categories" value="Select Categories" />
                <CollectionSelector :collection="categories" />
            </div>
        </template>
        <template #actions>
            <primary-button>
                {{ updating ? 'Update' : 'Create' }}
            </primary-button>
        </template>
    </FormSection>
</template>
