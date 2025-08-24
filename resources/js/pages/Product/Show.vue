<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Card, CardContent, CardFooter, CardHeader } from '@/components/ui/card';
import { type BreadcrumbItem, Product } from '@/types';
import { Button } from '@/components/ui/button';

defineProps<{ product: Product }>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: '/products',
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex">
            <Card class="p-4">
                <CardHeader tag="h2" class="text-3xl leading-tight font-semibold">
                    {{ product.name }}
                </CardHeader>
                <CardContent>
                    {{ product.description }}
                </CardContent>
                <CardFooter>
                    <div class="text-muted-foreground italic">Downloaded X times.</div>
                    <Button class="ml-auto cursor-pointer">Download</Button>
                </CardFooter>
            </Card>
        </div>
    </AppLayout>
</template>
