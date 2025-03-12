<x-guest-layout>
    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Password Field -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700">
                Login as Admin
            </button>
        </div>
    </form>
</x-guest-layout>
