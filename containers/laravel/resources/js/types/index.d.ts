import { InertiaLinkProps } from '@inertiajs/vue3';
import type { LucideIcon } from 'lucide-vue-next';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    role: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    isAdmin: boolean;
    isManager: boolean;
}

export interface Member {
    id: number | null;
    name: string;
    role: string;
    status: string;
    assigned_at: string;
    user_id: number;
}

export interface Project {
    id: number;
    title: string;
    description: string;
    members: Member[];
}
export type BreadcrumbItemType = BreadcrumbItem;
