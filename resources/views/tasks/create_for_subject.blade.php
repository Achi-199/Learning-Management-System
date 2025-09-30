<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Create Task for {{ $subject->name }}</h1>

        <form method="POST" action="{{ route('teacher.subjects.tasks.store', $subject->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block font-bold">Title:</label>
                <input name="title" type="text" class="w-full p-2 rounded" required value="{{ old('title') }}">
                @error('title') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block font-bold">Description:</label>
                <textarea name="description" class="w-full p-2 rounded" required>{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block font-bold">Points:</label>
                <input name="points" type="number" class="w-full p-2 rounded" value="{{ old('points') }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Task</button>
        </form>
    </div>
</x-app-layout>
