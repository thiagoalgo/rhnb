<div>
    @if (session('info'))
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 shadow" role="alert">
            {{ session('info') }}
        </div>
    @endif
    @if (session('danger'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 shadow" role="alert">
            {{ session('danger') }}
        </div>
    @endif
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 shadow" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" shadow
            role="alert">
            {{ session('warning') }}
        </div>
    @endif
    @if (session('dark'))
        <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 shadow" role="alert">
            {{ session('dark') }}
        </div>
    @endif
</div>
