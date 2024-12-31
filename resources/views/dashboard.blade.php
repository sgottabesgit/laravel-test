<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ __("You're logged in!") }}</h3>
                    <p class="text-lg">Welcome back, <strong>{{ Auth::user()->name }}</strong>! Explore the app and start creating content.</p>
                </div>
            </div>

            <!-- Links and Actions -->
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Link to Articles -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-center">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Manage Articles</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">View, create, and manage your articles here.</p>
                    <a href="{{ route('articles.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        Go to Articles
                    </a>
                </div>

                <!-- Link to Profile -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-center">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Edit Profile</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Update your personal information and settings.</p>
                    <a href="{{ route('profile.edit') }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition">
                        Edit Profile
                    </a>
                </div>

                <!-- Logout Option -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg p-6 text-center">
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Logout</h4>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Log out of the application safely.</p>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
