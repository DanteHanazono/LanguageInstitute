<script>
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

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
                <TextInput id="description" v-model="form.name" type="text" autocomplete="description"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.description" class="mt-2" />

                <InputLabel class="mt-2" for="content_url" value="Content Url" />
                <TextInput id="content_url" v-model="form.conten_url" type="text" autocomplete="content_url"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.content_url" class="mt-2" />

                <InputLabel class="mt-2" for="pdf_url" value="PDF File" />
                <SecondaryButton class="mt-2 mr-2" type="button" @click="">Upload PDF </SecondaryButton>
                <InputError :message="$page.props.errors.pdf_url" class="mt-2" />


            </div>
        </template>
        <template #actions>
            <primary-button>
                {{ updating ? 'Update' : 'Create' }}
            </primary-button>
        </template>
    </FormSection>
</template>
