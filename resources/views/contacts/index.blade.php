<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Contacts
            </h2>

            <a href="{{ route('contacts.create') }}">
                <x-primary-button>
                    Add Contact
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                    <tr>
                        <th class="px-3 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                            Name
                        </th>
                        <th class="px-3 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                            Contact
                        </th>
                        <th class="px-3 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-400">
                            Email
                        </th>
                        <th class="px-3 py-3"></th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($contacts as $contact)
                        <tr>
                            <td class="px-3 py-4 text-sm">
                                <a href="{{ route('contacts.show', $contact) }}"
                                   class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $contact->name }}
                                </a>
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 dark:text-gray-100">
                                {{ $contact->contact }}
                            </td>
                            <td class="px-3 py-4 text-sm text-gray-900 dark:text-gray-100">
                                {{ $contact->email }}
                            </td>
                            <td class="px-3 py-4 text-right text-sm">
                                @auth
                                    <a href="{{ route('contacts.edit', $contact) }}"
                                       class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                        Edit
                                    </a>
                                @endauth
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-6 text-center text-sm text-gray-500">
                                No contacts found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <td colspan="4" class="px-3 py-4">
                            {{ $contacts->links() }}
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
