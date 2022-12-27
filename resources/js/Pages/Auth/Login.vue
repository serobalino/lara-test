<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: true,
});

const submit = () => {
    window.location = route('auth-ms')
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <form @submit.prevent="submit">
            <div class="flex items-center justify-end mt-4 mb-4">
                <primary-button class="ml-4 w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ingresar al Sistema
                </primary-button>
            </div>
        </form>
    </GuestLayout>
</template>
