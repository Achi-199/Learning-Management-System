<!-- <x-app-layout>
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Your Tasks</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('teacher.tasks.create') }}" class="bg-blue-500 text-gray-200 px-4 py-2 rounded mb-4 inline-block">Create New Task</a>

    <table class="table-auto w-full text-gray-700">
        <thead>
            <tr class="text-gray-200 bg-gray-700">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Deadline</th>
                <th class="px-4 py-2">Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="text-gray-900">
                    <td class="border px-4 py-2">{{ $task->title }}</td>
                    <td class="border px-4 py-2">{{ $task->deadline }}</td>
                    <td class="border px-4 py-2">{{ $task->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border px-4 py-2 text-center text-gray-200">No tasks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout> -->
