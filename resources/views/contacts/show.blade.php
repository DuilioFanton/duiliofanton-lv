<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Contact Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Contact Info -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-white">
                <div class="max-w-xl space-y-3">
                    <p>
                        <span class="font-medium text-gray-900 dark:text-gray-100">Name:</span>
                        {{ $contact->name }}
                    </p>

                    <p>
                        <span class="font-medium text-gray-900 dark:text-gray-100">Contact:</span>
                        {{ $contact->contact }}
                    </p>

                    <p>
                        <span class="font-medium text-gray-900 dark:text-gray-100">Email:</span>
                        {{ $contact->email }}
                    </p>
                </div>
            </div>

            @auth
                <!-- Actions -->
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Actions
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Manage this contact.
                            </p>
                        </header>

                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('contacts.edit', $contact) }}">
                                <x-secondary-button>
                                    Edit Contact
                                </x-secondary-button>
                            </a>

                            <form method="POST"
                                  action="{{ route('contacts.destroy', $contact) }}">
                                @csrf
                                @method('DELETE')

                                <x-danger-button>
                                    Delete Contact
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</x-app-layout>
