<div class="space-y-6">

    <div>
        <x-input-label for="name" value="Name" />
        <x-text-input id="name" name="name" type="text"
                      class="mt-1 block w-full"
                      :value="old('name', $contact->name ?? '')"
                      required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="contact" value="Contact" />
        <x-text-input id="contact" name="contact" type="text"
                      class="mt-1 block w-full"
                      :value="old('contact', $contact->contact ?? '')"
                      required />
        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="email" value="Email" />
        <x-text-input id="email" name="email" type="email"
                      class="mt-1 block w-full"
                      :value="old('email', $contact->email ?? '')"
                      required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Save</x-primary-button>
    </div>

</div>
