<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card } from '@/components/ui/card';
import { type BreadcrumbItem, Category, Product } from '@/types';
import { computed, ComputedRef, ref } from 'vue';

const props = defineProps<{ categories: Array<Category> }>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Assets',
        href: '/categories',
    },
];

const selectedCategoryId = ref(1);

const selectedCategoryProducts: ComputedRef<Product[] | undefined> = computed(() => {
    const category = props.categories.find((_category) => _category.id === selectedCategoryId.value)

    return category?.products;
});

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mb-10 ml-auto flex">
            <Card
                :class="{
                    'mx-1 px-4 py-2 select-none cursor-pointer': true,
                    'bg-accent text-background': category.id === selectedCategoryId,
                }"
                v-for="category in props.categories"
                :key="category.id"
                :bordered="false"
                @click="selectedCategoryId = category.id"
            >
                <div>
                    {{ category.name }}
                </div>
            </Card>
        </div>
        <div class="grid grid-cols-3 gap-2 gap-y-4">
            <Card class="mx-1 px-4 py-2" v-for="product in selectedCategoryProducts" :key="product.id">
                {{ product.name }}
            </Card>
        </div>
    </AppLayout>
</template>
