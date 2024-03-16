<script>
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

export default {
    name: 'CategoriesForm',
    components: {
        FormSection,
        PrimaryButton,
        InputError,
        InputLabel,
        TextInput,
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
            {{ updating ? 'Update Category' : 'Create New Category' }}
        </template>
        <template #description>
            {{ updating ? 'Update selected category' : "Let's create a new one." }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>
        <template #actions>
            <primary-button>
                {{ updating ? 'Update' : 'Create' }}
            </primary-button>
        </template>
    </FormSection>
</template>
