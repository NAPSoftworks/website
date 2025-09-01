<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { Textarea } from '@/components/ui/textarea';
import { Button } from '@/components/ui/button';
import { InputGroup } from '@/components/ui/input-group';
import { hasGoogleConsent } from '@/composables/useCookie';
import { cn } from '@/lib/utils';
import { computed, ComputedRef, onMounted } from 'vue';

const $page = usePage();

const form = useForm({
    name: '',
    email: '',
    message: '',
    captcha_token: '',
});

const isDisabled: ComputedRef<boolean> = computed(() => {
    return !hasGoogleConsent();
});

const disabledClass: string = isDisabled.value ? 'opacity-50 cursor-not-allowed' : '';

onMounted(() => {
    if (isDisabled.value) return;

    const recaptchaScript = document.createElement('script');

    recaptchaScript.setAttribute('src', `https://www.google.com/recaptcha/api.js?render=${$page.props.recaptcha_key}`);

    document.head.appendChild(recaptchaScript);
});

const openCookieSettings = () => {
    window.dispatchEvent(new Event('open-cookie-settings'));
};

const submit = () => {
    if (isDisabled.value) return;

    window.grecaptcha.execute($page.props.recaptcha_key, { action: 'contact' }).then((token: string) => {
        form.captcha_token = token;

        form.post(route('contact.store'), {
            onSuccess: () => form.reset(),
        });
    });
};
</script>

<template>
    <AppLayout>
        <Card class="p-4">
            <CardContent>
                <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
                    <div>
                        <h2 class="mb-4 w-full text-2xl font-bold">About NAP Softworks</h2>
                        <div>
                            <figure class="float-left mr-6 w-40">
                                <img src="/img/pb_profile_photo.jpg" class="h-auto w-full rounded-xl" alt="NAP Softworks founder's photo" />
                                <figcaption class="mt-1 text-sm text-muted-foreground italic">Founder of NAP Softworks</figcaption>
                            </figure>
                            <p class="mb-4 text-justify">
                                Skilled and ambitious software developer with a passion for creating innovative and user-friendly applications, fluent
                                in Laravel, Vue.js, and Tailwind CSS. With a strong foundation in web development, I specialize in creating dynamic
                                and responsive websites that meet the needs of businesses of all sizes. I am dedicated to delivering high-quality
                                software solutions that meet the needs of my clients and users.
                            </p>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                    <div class="relative">
                        <div
                            v-if="isDisabled"
                            class="absolute inset-0 z-10 flex flex-col items-center justify-center border bg-white/60 p-6 text-center backdrop-blur-sm rounded-xl"
                        >
                            <span>
                                The contact form is disabled until you give consent to use the Google reCAPTCHA.
                            </span>
                            <span class="mt-4 underline cursor-pointer" @click="openCookieSettings()">
                                Open Cookie Settings
                            </span>
                        </div>
                        <h2 class="mb-4 px-4 text-2xl font-bold">Contact me!</h2>
                        <form :class="cn('grid gap-6 px-4', disabledClass)" :disabled="isDisabled" @submit.prevent="submit">
                            <InputGroup>
                                <Label for="name">Name</Label>
                                <Input id="name" type="text" v-model="form.name" placeholder="Name" :disabled="isDisabled" />
                                <InputError :message="form.errors.name" />
                            </InputGroup>
                            <InputGroup>
                                <Label for="email">E-mail address</Label>
                                <Input id="email" type="email" v-model="form.email" placeholder="E-mail address" :disabled="isDisabled" />
                                <InputError :message="form.errors.email" />
                            </InputGroup>
                            <InputGroup>
                                <Label for="message">Message</Label>
                                <Textarea id="message" v-model="form.message" placeholder="Message" :disabled="isDisabled" />
                                <InputError :message="form.errors.message" />
                            </InputGroup>
                            <div class="text-justify text-sm text-muted-foreground italic">
                                This site is protected by reCAPTCHA and the Google
                                <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> and
                                <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
                            </div>
                            <InputGroup>
                                <Button class="flex justify-self-end" type="submit">Send message</Button>
                            </InputGroup>
                        </form>
                    </div>
                </div>
            </CardContent>
        </Card>
    </AppLayout>
</template>
