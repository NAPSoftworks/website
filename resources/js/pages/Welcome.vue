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
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="flex-1/2">
                        <h3 class="text-xl font-bold">A new upcoming game!</h3>
                        <h2 class="text-4xl font-extrabold uppercase">Joyriders</h2>
                        <div class="mt-4 text-justify">
                            A 2.5D top-down shooter game set in Chem City, where you play as an ambitious gangster who wants to rule the city. Your
                            goal is to win other gangs' respect and climb the crime ladder by any means necessary.
                        </div>
                        <h4 class="mt-4 text-xl font-bold">Features:</h4>
                        <ul class="list-inside list-disc">
                            <li>2.5D top-down retro-inspired graphics,</li>
                            <li>Realistic city environment,</li>
                            <li>Various missions to accomplish,</li>
                            <li>Plenty of cars to joyride,</li>
                            <li>A whole pallet of weapons to wreak havoc with,</li>
                            <li>Radio stations to enjoy,</li>
                            <li>And much more!</li>
                        </ul>
                        <div class="mt-4 text-sm text-muted italic">Features are subject to change</div>
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
                <div class="text-2xl font-bold uppercase">Your place for free game assets!</div>
                <div>Go grab some assets and speed up development.</div>
                <div class="mt-4">
                    <Link :href="route('categories.index')" class="cursor-pointer text-lg font-bold underline">
                        Browse assets now
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
