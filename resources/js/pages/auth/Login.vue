<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const loginForm = useForm({
    email: '',
    password: '',
    remember: false,
});

const registerForm = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submitLogin = () => {
    loginForm.post(route('login'), {
        onFinish: () => loginForm.reset('password'),
    });
};

const submitRegister = () => {
    registerForm.post(route('register'), {
        onFinish: () => registerForm.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AppLayout>
        <Head title="Log in" />
        <Card class="mx-auto">
            <CardContent class="flex flex-col items-center justify-center gap-4">
                <Tabs default-value="login" class="w-[400px]">
                    <TabsList class="grid w-full grid-cols-2">
                        <TabsTrigger value="login" class="cursor-pointer">
                            Log in
                        </TabsTrigger>
                        <TabsTrigger value="register" class="cursor-pointer">
                            Register
                        </TabsTrigger>
                    </TabsList>
                    <TabsContent value="login">
                        <CardHeader class="my-4">
                            <CardTitle>Log in</CardTitle>
                            <CardDescription>
                                Using this form you can log into your account.
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
                                {{ status }}
                            </div>

                            <form @submit.prevent="submitLogin" class="flex flex-col gap-6">
                                <div class="grid gap-6">
                                    <div class="grid gap-2">
                                        <Label for="email">Email address</Label>
                                        <Input
                                            id="email"
                                            type="email"
                                            required
                                            autofocus
                                            :tabindex="1"
                                            autocomplete="email"
                                            v-model="loginForm.email"
                                            placeholder="email@example.com"
                                        />
                                        <InputError :message="loginForm.errors.email" />
                                    </div>

                                    <div class="grid gap-2">
                                        <div class="flex items-center justify-between">
                                            <Label for="password">Password</Label>
                                            <TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm" :tabindex="5">
                                                Forgot password?
                                            </TextLink>
                                        </div>
                                        <Input
                                            id="password"
                                            type="password"
                                            required
                                            :tabindex="2"
                                            autocomplete="current-password"
                                            v-model="loginForm.password"
                                            placeholder="Password"
                                        />
                                        <InputError :message="loginForm.errors.password" />
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <Label for="remember" class="flex items-center space-x-3">
                                            <Checkbox id="remember" v-model="loginForm.remember" :tabindex="3" />
                                            <span>Remember me</span>
                                        </Label>
                                    </div>

                                    <Button type="submit" class="mt-4 w-full" :tabindex="4" :disabled="loginForm.processing">
                                        <LoaderCircle v-if="loginForm.processing" class="h-4 w-4 animate-spin" />
                                        Log in
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </TabsContent>
                    <TabsContent value="register">
                        <CardHeader class="my-4">
                            <CardTitle>Register</CardTitle>
                            <CardDescription>
                                Using this form you can register a brand new account.
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <form @submit.prevent="submitRegister" class="flex flex-col gap-6">
                                <div class="grid gap-6">
                                    <div class="grid gap-2">
                                        <Label for="name">Name</Label>
                                        <Input id="name" type="text" required autofocus :tabindex="1" autocomplete="name" v-model="registerForm.name" placeholder="Full name" />
                                        <InputError :message="registerForm.errors.name" />
                                    </div>

                                    <div class="grid gap-2">
                                        <Label for="email">Email address</Label>
                                        <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="registerForm.email" placeholder="email@example.com" />
                                        <InputError :message="registerForm.errors.email" />
                                    </div>

                                    <div class="grid gap-2">
                                        <Label for="password">Password</Label>
                                        <Input
                                            id="password"
                                            type="password"
                                            required
                                            :tabindex="3"
                                            autocomplete="new-password"
                                            v-model="registerForm.password"
                                            placeholder="Password"
                                        />
                                        <InputError :message="registerForm.errors.password" />
                                    </div>

                                    <div class="grid gap-2">
                                        <Label for="password_confirmation">Confirm password</Label>
                                        <Input
                                            id="password_confirmation"
                                            type="password"
                                            required
                                            :tabindex="4"
                                            autocomplete="new-password"
                                            v-model="registerForm.password_confirmation"
                                            placeholder="Confirm password"
                                        />
                                        <InputError :message="registerForm.errors.password_confirmation" />
                                    </div>

                                    <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="registerForm.processing">
                                        <LoaderCircle v-if="registerForm.processing" class="h-4 w-4 animate-spin" />
                                        Create account
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </TabsContent>
                </Tabs>
            </CardContent>
        </Card>
    </AppLayout>
</template>
