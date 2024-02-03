<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login!</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <x-form.button>Login</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>