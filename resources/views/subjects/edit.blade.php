<x-app-layout>
    <div class="max-w-3xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Subject</h1>

        <form action="{{ route('teacher.subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label class="block font-bold">Subject Name:</label>
                <input type="text" name="name" value="{{ old('name', $subject->name) }}" class="w-full p-2 rounded" required>
                @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block font-bold">Description:</label>
                <textarea name="description" class="w-full p-2 rounded">{{ old('description', $subject->description) }}</textarea>
                @error('description') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Code -->
            <div class="mb-4">
                <label class="block font-bold">Subject Code:</label>
                <input type="text" name="code" value="{{ old('code', $subject->code) }}" class="w-full p-2 rounded" required>
                @error('code') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Credits -->
            <div class="mb-4">
                <label class="block font-bold">Credit Value:</label>
                <input type="number" name="credits" value="{{ old('credits', $subject->credits) }}" class="w-full p-2 rounded" required>
                @error('credits') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save Changes</button>
        </form>
    </div>
</x-app-layout>
