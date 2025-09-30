<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-black">Edit Task</h1>

        <form method="POST" action="{{ route('teacher.tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-black font-bold">Title:</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded" required
                    value="{{ old('title', $task->title) }}">
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-black font-bold">Description:</label>
                <textarea name="description" id="description" class="w-full p-2 rounded" required>{{ old('description', $task->description) }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Points -->
            <div class="mb-4">
                <label for="points" class="block text-black font-bold">Points:</label>
                <input type="number" name="points" id="points" class="w-full p-2 rounded" required
                    value="{{ old('points', $task->points) }}">
                @error('points')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Task</button>
        </form>
    </div>
</x-app-layout>
