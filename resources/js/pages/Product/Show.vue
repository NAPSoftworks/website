<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { type BreadcrumbItem, Category, Product } from '@/types';
import { Button } from '@/components/ui/button';
import ProductImage from '@/pages/Product/Components/ProductImage.vue';
import { Ref, ref } from 'vue';
import { formatDate } from '@/composables/useDate';

const props = defineProps<{ category: Category; product: Product }>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: `/categories/${props.product.category_id}/products/${props.product.id}`,
    },
];

const selectedImageId: Ref<number | null> = ref(null);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex">
            <Card class="p-4">
                <CardHeader tag="h2">
                    <div class="flex justify-between text-3xl leading-tight font-semibold">
                        <div>{{ product.name }}</div>
                        <div class="text-3xl leading-tight font-semibold">{{ category.name }}</div>
                    </div>
                    <div class="text-muted">
                        Created on {{ formatDate(product.created_at) }}
                    </div>
                </CardHeader>
                <CardContent>
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full flex-shrink-0 flex-grow-0 lg:w-1/2">
                            <div v-show="!selectedImageId" class="grid grid-cols-2 gap-2 pb-4 lg:pb-0">
                                <ProductImage :name="product.name" @click="selectedImageId = 1" />
                                <ProductImage :name="product.name" @click="selectedImageId = 2" />
                                <ProductImage :name="product.name" @click="selectedImageId = 3" />
                                <ProductImage :name="product.name" @click="selectedImageId = 4" />
                            </div>
                            <div v-show="selectedImageId" class="aspect-square flex-grow-1">
                                <ProductImage :name="product.name" @click="selectedImageId = null" />
                            </div>
                            <div class="text-center text-muted italic">
                                Click on an image to zoom it.
                            </div>
                        </div>
                        <div class="text-justify lg:pl-10">
                            {{ product.description }}
                        </div>
                    </div>
                </CardContent>
                <CardFooter>
                    <div class="text-muted-foreground italic">Downloaded X times.</div>
                    <Button class="ml-auto cursor-pointer">Download</Button>
                </CardFooter>
            </Card>
        </div>
    </AppLayout>
</template>
