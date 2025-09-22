<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        <Card>
            <CardContent>
                <div class="flex flex-col lg:flex-row gap-10">
                    <div>
                        <div class="aspect-4/3 overflow-hidden rounded-xl drop-shadow-lg">
                            <video class="w-full aspect-4/3" autoplay muted loop>
                                <source src="/video/joyriders_1.mp4" type="video/mp4" />
                                {{ $t('global.your-browser-does-not-support-video-tag') }}.
                            </video>
                        </div>
                    </div>
                    <div class="flex-1/2">
                        <h3 class="text-xl font-bold">{{ $t('welcome.a-new-upcoming-game') }}</h3>
                        <h2 class="text-4xl font-extrabold uppercase">Joyriders</h2>
                        <div class="mt-4 text-justify">
                            {{ $t('welcome.joyriders-description') }}
                        </div>
                        <h4 class="mt-4 text-xl font-bold">{{ $t('global.features') }}:</h4>
                        <ul class="list-inside list-disc">
                            <li>{{ $t('welcome.features.2d-retro-graphics') }},</li>
                            <li>{{ $t('welcome.features.realistic-city-environment') }},</li>
                            <li>{{ $t('welcome.features.various-missions-to-accomplish') }},</li>
                            <li>{{ $t('welcome.features.plenty-of-cars-to-joyride') }},</li>
                            <li>{{ $t('welcome.features.a-whole-collection-of-weapons-to-wreak-havoc-with') }},</li>
                            <li>{{ $t('welcome.features.radio-stations-to-enjoy') }},</li>
                            <li>{{ $t('welcome.features.and-much-more') }}!</li>
                        </ul>
                        <div class="mt-4 text-sm text-muted italic">
                            {{ $t('welcome.features.features-are-subject-to-change') }}
                        </div>
                    </div>
                </div>
            </CardContent>
        </Card>
        <div class="bg-gradient mt-10 flex flex-col lg:flex-row gap-4 rounded-xl text-center text-white">
            <div class="mx-16">
                <div class="relative mx-auto w-full sm:w-2/3 lg:w-full max-w-3xl">
                    <img
                        class="w-full h-auto animate-[spin_15s_linear_infinite]"
                        src="/img/homepage_bg_assets_presenter_sm.webp"
                        alt="An image background for presentation purposes"
                    />
                    <img
                        class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 max-w-[70%] h-auto"
                        src="/img/house_1.webp"
                        alt="An image of a 3D house asset"
                    />
                </div>
            </div>
            <div id="content" class="flex flex-col flex-1 px-16 pb-8 lg:pb-0 justify-center items-center">
                <div class="text-2xl font-bold uppercase">{{ $t('welcome.your-place-for-free-game-assets') }}!</div>
                <div>{{ $t('welcome.go-grab-some-assets-and-speed-up-development') }}</div>
                <div class="mt-4">
                    <Link :href="route('categories.index')" class="cursor-pointer text-lg font-bold underline">
                        {{ $t('welcome.browse-assets-now') }}
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
