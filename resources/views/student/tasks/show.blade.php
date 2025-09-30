<x-app-layout>
   <div class="max-w-4xl mx-auto py-8">
      <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>

      <p><strong>Subject:</strong> {{ $task->subject->name }}</p>
      <p><strong>Teacher:</strong> {{ $task->subject->teacher->name }}</p>
      <p><strong>Description:</strong> {{ $task->description }}</p>
      <p><strong>Points:</strong> {{ $task->points }}</p>

      @if (session('success'))
      <div class="text-green-600 mt-4">{{ session('success') }}</div>
      @endif

      <form method="POST" action="{{ route('student.tasks.submit', $task->id) }}" class="mt-6">
         @csrf
         <div>
            <label for="solution" class="block font-medium">Your Solution</label>
            <textarea name="solution" id="solution" rows="6" class="w-full border rounded px-3 py-2 mt-1" required>{{ old('solution') }}</textarea>
            @error('solution')
            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
         </div>
         <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit Solution
         </button>
      </form>
   </div>
</x-app-layout>