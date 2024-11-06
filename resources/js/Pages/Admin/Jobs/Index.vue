<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, usePage, Link} from "@inertiajs/vue3";

const {listings} = usePage().props;
</script>

<template>
  <Head title="All Jobs"/>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        All Jobs
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
              <thead
                  class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th class="px-6 py-3" scope="col">
                  Job Title
                </th>
                <th class="px-6 py-3" scope="col">
                  Company Name
                </th>
                <th class="px-6 py-3" scope="col">
                  Job Role
                </th>
                <th class="px-6 py-3" scope="col">
                  Salary
                </th>
                <th class="px-6 py-3" scope="col">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
              </thead>
              <tbody>

              <template v-if="listings.data.length">
                <tr
                    v-for="job in listings.data"
                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                  <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                      scope="row">
                    <Link :href="route('admin.listings.show', job.id)">
                      {{ job.title }}
                    </Link>
                    <p class="text-xs opacity-50 dark:opacity-30">
                      {{ job.created_at }}</p>
                  </th>
                  <td class="whitespace-nowrap px-6 py-4">
                    {{ job.company_name }}
                  </td>
                  <td class="px-6 py-4">
                    {{ job.role }}
                  </td>
                  <td class="whitespace-nowrap px-6 py-4">
                        <span
                            class="me-2 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                          {{ job.salary }}</span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <Link class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                          :href="route('admin.listings.edit', job.id)">
                      Edit
                    </Link>
                  </td>
                </tr>
              </template>
              <template v-else>
                <tr>
                  <td>empty</td>
                  <td>empty</td>
                  <td>empty</td>
                  <td>empty</td>
                  <td>empty</td>
                </tr>
              </template>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
