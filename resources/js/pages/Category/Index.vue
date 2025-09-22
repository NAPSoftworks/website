<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card } from '@/components/ui/card';
import { type BreadcrumbItem, Category, Product } from '@/types';
import { computed, ComputedRef, ref } from 'vue';
import { cn } from '@/lib/utils';
import ProductItem from '@/pages/Category/ProductItem.vue';

const props = defineProps<{ categories: Array<Category> }>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Assets',
        href: '/categories',
    },
];

const selectedCategoryId = ref(1);

const selectedCategoryProducts: ComputedRef<Product[]> = computed(() => {
    const category = props.categories.find((_category) => _category.id === selectedCategoryId.value);

    return category?.products ?? [];
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mb-10 ml-auto flex">
            <Card
                :class="cn('mx-1 cursor-pointer px-4 py-2 select-none', category.id === selectedCategoryId ? 'bg-accent text-background' : '')"
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
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <ProductItem v-for="product in selectedCategoryProducts" :key="product.id" :product="product" />
        </div>
        <div class="mt-4 ml-auto flex text-muted italic">
            {{ $t('global.showing-n-products', { n: selectedCategoryProducts?.length.toString() }) }}.
        </div>
    </AppLayout>
</template>
