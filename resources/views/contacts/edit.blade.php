<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Contact -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Contact Information
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Update the contact's name, phone number and email address.
                        </p>
                    </header>

                    <form method="POST"
                          action="{{ route('contacts.update', $contact) }}"
                          class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        @include('contacts._form', ['contact' => $contact])
                    </form>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Delete Contact
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Once a contact is deleted, it cannot be recovered.
                        </p>
                    </header>

                    <form method="POST"
                          action="{{ route('contacts.destroy', $contact) }}"
                          class="mt-6">
                        @csrf
                        @method('DELETE')

                        <x-danger-button>
                            Delete Contact
                        </x-danger-button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
