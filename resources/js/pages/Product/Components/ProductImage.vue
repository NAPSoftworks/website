<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps<{ name: string }>();

const isImageLoaded = ref(false);
</script>

<template>
    <div>
        <div v-if="!isImageLoaded" class="aspect-square">
            <div class="flex h-full w-full animate-pulse items-center justify-center rounded-xl bg-gray-300 dark:bg-gray-700">
                <svg
                    class="h-10 w-10 text-gray-200 dark:text-gray-600"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 18"
                >
                    <path
                        d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"
                    />
                </svg>
            </div>
        </div>
        <img
            v-show="isImageLoaded"
            src="https://picsum.photos/512"
            class="img-fluid w-full rounded-xl border-2 shadow-md cursor-pointer"
            :alt="props.name"
            @load="() => isImageLoaded = true"
        />
    </div>
</template>

<style scoped></style>
