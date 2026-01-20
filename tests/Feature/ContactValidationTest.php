<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

    $this->user = User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@example.com',
    ]);
});

it('fails to create contact with invalid data', function () {
    $response = $this->actingAs($this->user)
        ->from(route('contacts.create'))
        ->post(route('contacts.store'), [
            'name' => 'abc',
            'contact' => '123',
            'email' => 'invalid-email',
        ]);

    $response->assertSessionHasErrors(['name', 'contact', 'email']);
});

it('fails to create contact with duplicate contact or email', function () {
    Contact::factory()->create([
        'contact' => '912345678',
        'email' => 'test@example.com',
    ]);

    $response = $this->actingAs($this->user)
        ->post(route('contacts.store'), [
            'name' => 'Valid Name',
            'contact' => '912345678',
            'email' => 'test@example.com',
        ]);

    $response->assertSessionHasErrors(['contact', 'email']);
});

it('fails to update contact with invalid data', function () {
    $contact = Contact::factory()->create();

    $response = $this->actingAs($this->user)
        ->put(route('contacts.update', $contact), [
            'name' => 'abc',
            'contact' => '123',
            'email' => 'invalid',
        ]);

    $response->assertSessionHasErrors(['name', 'contact', 'email']);
});

it('creates a contact successfully', function () {
    $response = $this->actingAs($this->user)
        ->post(route('contacts.store'), [
            'name' => 'Valid Contact',
            'contact' => '912345678',
            'email' => 'valid@example.com',
        ]);

    $response->assertRedirect(route('contacts.index'));

    $this->assertDatabaseHas('contacts', [
        'email' => 'valid@example.com',
    ]);
});

it('updates a contact successfully', function () {
    $contact = Contact::factory()->create();

    $response = $this->actingAs($this->user)
        ->put(route('contacts.update', $contact), [
            'name' => 'Updated Name',
            'contact' => '987654321',
            'email' => 'updated@example.com',
        ]);

    $response->assertRedirect(route('contacts.show', $contact));

    $this->assertDatabaseHas('contacts', [
        'email' => 'updated@example.com',
    ]);
});
