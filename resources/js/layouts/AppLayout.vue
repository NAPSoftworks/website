<script setup lang="ts">
import type { BreadcrumbItemType } from '@/types';
import { NavigationMenu, NavigationMenuItem, NavigationMenuLink, NavigationMenuList } from '@/components/ui/navigation-menu';
import { Head, Link } from '@inertiajs/vue3';
import { getInitials } from '@/composables/useInitials';
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { Button } from '@/components/ui/button';
import UserMenuContent from '@/components/UserMenuContent.vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { UserCircle } from 'lucide-vue-next';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <div class="bg-muted min-h-screen">
        <Head title="NAP Softworks" />
        <div class="bg-gray-600/20 shadow-lg bg-gradient">
            <div class="flex items-center">
                <div class="ml-auto">
                    <Link :href="route('home')" title="NAP Softworks home page">
                        <img :src="`/img/nap_softworks_logo_icon.png`" class="mx-auto max-h-10" alt="NAP Softworks logo" />
                    </Link>
                </div>
                <NavigationMenu class="ml-auto max-w-1/2 py-3">
                    <NavigationMenuList>
                        <NavigationMenuItem>
                            <NavigationMenuLink :href="route('home')" class="font-semibold text-gray-300"> Home </NavigationMenuLink>
                        </NavigationMenuItem>
                        <NavigationMenuItem>
                            <NavigationMenuLink :href="route('categories.index')" class="font-semibold text-gray-300"> Assets </NavigationMenuLink>
                        </NavigationMenuItem>
                        <NavigationMenuItem>
                            <NavigationMenuLink class="font-semibold text-gray-300"> Contact </NavigationMenuLink>
                        </NavigationMenuItem>
                        <NavigationMenuItem>
                            <DropdownMenu v-if="$page.props.auth.user">
                                <DropdownMenuTrigger :as-child="true">
                                    <Button
                                        variant="ghost"
                                        size="icon"
                                        class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                                    >
                                        <Avatar class="size-8 overflow-hidden rounded-full">
                                            <AvatarImage v-if="$page.props.auth.user.avatar" :src="$page.props.auth.user.avatar" :alt="$page.props.auth.user.name" />
                                            <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                                                {{ getInitials($page.props.auth.user?.name) }}
                                            </AvatarFallback>
                                        </Avatar>
                                    </Button>
                                </DropdownMenuTrigger>
                                <DropdownMenuContent v-if="$page.props.auth.user" align="end" class="w-56">
                                    <UserMenuContent :user="$page.props.auth.user" />
                                </DropdownMenuContent>
                            </DropdownMenu>
                            <Link v-else :href="route('authenticate')" title="Account">
                                <Button
                                    variant="ghost"
                                    size="icon"
                                    class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                                >
                                    <Avatar class="size-8 overflow-hidden rounded-full">
                                        <AvatarFallback class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white">
                                            <UserCircle />
                                        </AvatarFallback>
                                    </Avatar>
                                </Button>
                            </Link>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>
            </div>
        </div>

        <div class="py-10">
            <div class="w-3/4 flex flex-col mx-auto justify-center">
                <slot />
            </div>
        </div>
        <div class="flex-1 text-center footer">
            &copy; 2025 NAP Softworks
        </div>
    </div>
</template>
