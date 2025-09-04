<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        <Card>
            <CardContent>
                <div class="flex flex-col sm:flex-row gap-10">
                    <div>
                        <div class="rounded-xl overflow-hidden drop-shadow-lg aspect-4/3">
                            <video class="aspect-4/3" autoplay muted loop>
                                <source src="/video/joyriders_1.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="flex-1/2">
                        <h3 class="text-xl font-bold">A new upcoming game!</h3>
                        <h2 class="text-4xl font-extrabold uppercase">Joyriders</h2>
                        <div class="mt-4 text-justify">
                            A 2.5D top-down shooter game set in Chem City, where you play as an ambitious gangster
                            who wants to rule the city. Your goal is to win other gangs' respect and climb the crime ladder
                            by any means necessary.
                        </div>
                        <h4 class="mt-4 text-xl font-bold">Features:</h4>
                        <ul class="list-disc list-inside">
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
        <div class="flex flex-col gap-4 py-12 mt-10 rounded-xl bg-gradient text-center text-white">
            <p class="text-2xl font-bold uppercase">Your place for free game assets!</p>
            <p>
                Download the game and enjoy the assets.
            </p>
            <p>
                <Button class="shadow-xl cursor-pointer uppercase" @click="router.visit(route('categories.index'))">
                    Browse assets
                </Button>
            </p>
        </div>
    </AppLayout>
</template>
