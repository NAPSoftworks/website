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

const $page = usePage();

const form = useForm({
    name: '',
    email: '',
    message: '',
    captcha_token: '',
});

const submit = () => {
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
                                <img src="/img/pb_profile_photo.jpg" alt="NAP Softworks founder's photo" class="h-auto w-full rounded-xl" />
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
                    <div>
                        <h2 class="mb-4 text-2xl font-bold">Contact me!</h2>
                        <form class="grid gap-6" @submit.prevent="submit">
                            <InputGroup>
                                <Label for="name">Name</Label>
                                <Input id="name" type="text" v-model="form.name" placeholder="Name" />
                                <InputError :message="form.errors.name" />
                            </InputGroup>
                            <InputGroup>
                                <Label for="email">E-mail address</Label>
                                <Input id="email" type="email" v-model="form.email" placeholder="E-mail address" />
                                <InputError :message="form.errors.email" />
                            </InputGroup>
                            <InputGroup>
                                <Label for="message">Message</Label>
                                <Textarea id="message" v-model="form.message" placeholder="Message" />
                                <InputError :message="form.errors.message" />
                            </InputGroup>
                            <div class="text-sm text-justify text-muted-foreground italic">
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
