<script setup lang="ts">
import { Card, CardAction, CardContent } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Product } from '@/types';
import { router } from '@inertiajs/vue3';
import ProductImage from '@/pages/Product/Components/ProductImage.vue';

const props = defineProps<{product: Product}>()

const visitProduct = () => router.visit(route('products.show', { category: props.product.category_id, product: props.product.id }));
</script>

<template>
    <Card>
        <CardContent>
            <ProductImage :name="props.product.name" @click="visitProduct()" />
            <div class="text-lg font-bold mt-2">
                {{ props.product.name }}
            </div>
            <div class="text-muted italic">Some description goes here.</div>
        </CardContent>
        <CardAction class="flex w-full px-6 justify-end mt-auto">
            <Button class="cursor-pointer" @click="visitProduct()">Details</Button>
        </CardAction>
    </Card>
</template>

<style scoped></style>
