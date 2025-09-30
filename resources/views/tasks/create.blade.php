<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-black">Create New Task</h1>

        <form method="POST" action="{{ route('teacher.subjects.tasks.store', $subject->id) }}">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-black font-bold">Title:</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded" required value="{{ old('title') }}">
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-black font-bold">Description:</label>
                <textarea name="description" id="description" class="w-full p-2 rounded">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Points -->
            <div class="mb-4">
                <label for="points" class="block text-black font-bold">Points:</label>
                <input type="number" name="points" id="points" class="w-full p-2 rounded" required>
                @error('points')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- value="{{ old('points') }}" -->
            <!-- Hidden subject ID -->
            <input type="hidden" name="subject_id" value="{{ $subject->id }}">

            <!-- Just show the subject name -->
            <div class="mb-4">
                <label class="block text-black font-bold">Subject:</label>
                <p class="text-black">{{ $subject->name }}</p>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</button>
        </form>


    </div>
</x-app-layout>