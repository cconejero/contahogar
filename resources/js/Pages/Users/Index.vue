<template>
    <Layout>
        <Head title="Usuarios" />

        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <h1 class="text-3xl">Usuarios</h1>

                <Link
                    v-if="can.createUser"
                    href="/users/create"
                    class="text-blue-500 text-sm ml-3"
                    >Nuevo Usuario</Link
                >
            </div>

            <input
                v-model="search"
                type="text"
                placeholder="Buscar..."
                class="border px-2 rounded-lg"
            />
        </div>

        <Table>
            <tr v-for="user in users.data" :key="user.id">
                <TableItem>
                    {{ user.name }}
                </TableItem>
                <TableItem>
                    <Link
                        v-if="user.can.edit"
                        :href="`/users/${user.id}/edit`"
                        class="text-indigo-600 hover:text-indigo-900"
                    >
                        Edit
                    </Link>
                </TableItem>
            </tr>
        </Table>
        <Pagination :links="users.links" class="mt-6" />

    </Layout>
</template>

<script setup>
import Pagination from "../../Shared/Pagination";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { debounce } from "lodash";
import Layout from "../../Shared/Layout";
import Table from "../../Shared/Table";
import TableItem from "../../Shared/TableItem";

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            "/users",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300)
);
</script>
