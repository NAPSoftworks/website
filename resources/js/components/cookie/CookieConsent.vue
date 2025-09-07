<script setup lang="ts">
import { onMounted, Ref, ref } from 'vue';
import { Button } from '@/components/ui/button';
import { useForm } from '@inertiajs/vue3';
import {
    AlertDialog,
    AlertDialogTitle,
    AlertDialogDescription,
    AlertDialogAction,
    AlertDialogContent,
    AlertDialogFooter,
    AlertDialogHeader
} from '@/components/ui/alert-dialog';
import { Switch } from '@/components/ui/switch';

const showModal: Ref = ref(true);
const consent: Ref = ref({ local_analytics: false, google: false });
const form = useForm({
    local_analytics: false,
    google: false,
});

const cancelSettings = () => {
    showModal.value = false;
};

const saveSettings = () => {
    storeConsent();

    showModal.value = false;
};

const storeConsent = () => {
    const jsonConsent = JSON.stringify(consent.value);
    const expiryDate = new Date();

    expiryDate.setFullYear(expiryDate.getFullYear() + 1);
    localStorage.setItem('cookieConsent', jsonConsent);
    document.cookie = `cookieConsent=${encodeURIComponent(jsonConsent)}; expires=${expiryDate.toUTCString()}; path=/; SameSite=Lax`;

    form.local_analytics = consent.value.local_analytics;
    form.google = consent.value.google;

    form.post(route('cookies.store'), { preserveScroll: true });
};

const denyAll = () => {
    for (const key in consent.value) {
        consent.value[key] = false;
    }
};

const allowAll = () => {
    for (const key in consent.value) {
        consent.value[key] = true;
    }
};

onMounted(() => {
    if (localStorage.getItem('cookieConsent')) {
        showModal.value = false;

        consent.value = JSON.parse(localStorage.getItem('cookieConsent')!);
    } else if (document.cookie.includes('cookieConsent=')) {
        consent.value = JSON.parse(
            decodeURIComponent(
                document.cookie
                    .split('; ')
                    .find((row) => row.startsWith('cookieConsent='))!
                    .split('=')[1],
            ),
        );
    }
});

defineExpose({
    showModal,
});
</script>
<template>
    <div>
        <AlertDialog v-model:open="showModal">
            <AlertDialogContent @pointer-down-outside="cancelSettings">
                <AlertDialogHeader>
                    <div class="absolute top-0 right-0 pt-4 pr-4">
                        <button
                            class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none"
                            title="Close"
                            type="button"
                            @click="cancelSettings"
                        >
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <AlertDialogTitle class="mb-4 text-center text-xl font-bold">We value your privacy... seriously.</AlertDialogTitle>
                    <AlertDialogDescription>
                        <div class="mt-6 space-y-4">
                            <!-- Essentials Cookies -->
                            <div class="rounded-lg border border-gray-200 p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-600">Essentials</h4>
                                        <p class="mt-1 text-sm text-gray-600">Essential description goes here</p>
                                    </div>
                                    <div class="ml-4">
                                        <span class="inline-block rounded bg-gray-100 px-2 py-1 text-xs text-gray-800"> Mandatory </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Local analytics Cookies -->
                            <div class="rounded-lg border border-gray-200 p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-600">Local analytics</h4>
                                        <p class="mt-1 text-sm text-gray-600">Analytics description goes here</p>
                                    </div>
                                    <div class="ml-4">
                                        <label class="inline-flex cursor-pointer items-center">
                                            <Switch v-model="consent.local_analytics" />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Google services Cookies -->
                            <div class="rounded-lg border border-gray-200 p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-600">Google services</h4>
                                        <p class="mt-1 text-sm text-gray-600">Preferences description goes here</p>
                                    </div>
                                    <div class="ml-4">
                                        <label class="inline-flex cursor-pointer items-center">
                                            <Switch v-model="consent.google" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <Button class="cursor-pointer rounded-md bg-primary px-4 py-2 text-sm hover:bg-primary/90" @click="denyAll"> Deny all </Button>

                    <Button class="cursor-pointer rounded-md bg-primary px-4 py-2 text-sm hover:bg-primary/90" @click="allowAll"> Allow all </Button>

                    <AlertDialogAction
                        class="cursor-pointer rounded-md bg-secondary px-4 py-2 text-sm hover:bg-secondary/90"
                        @click="saveSettings()"
                    >
                        Save changes
                    </AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    </div>
</template>
