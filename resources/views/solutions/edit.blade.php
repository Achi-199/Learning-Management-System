<x-app-layout>
   <div class="max-w-xl mx-auto py-8">
      <h2 class="text-2xl font-bold mb-4">Evaluate Solution</h2>

      <p><strong>Task:</strong> {{ $solution->task->title }}</p>
      <p><strong>Description:</strong> {{ $solution->task->description }}</p>

      <hr class="my-4">

      <p><strong>Submitted by:</strong> {{ $solution->student->name }} ({{ $solution->student->email }})</p>
      <p><strong>Solution:</strong></p>
      <textarea name="solution" id="solution" rows="6" class="w-full border rounded px-3 py-2 mt-1" readonly>
      {{ $solution->solution_text ?? 'No solution provided.' }}
      </textarea>

      <form method="POST" action="{{ route('teacher.solutions.update', $solution->id) }}" class="mt-4">
         @csrf
         @method('PUT')

         <label for="points" class="block font-semibold">Points (0 - {{ $solution->task->points }}):</label>
         <input type="number" name="points" id="points" min="0" max="{{ $solution->task->points }}" class="w-full p-2 border rounded mt-1" required value="{{ old('points', $solution->points) }}">

         @error('points')
         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
         @enderror

         <button type="submit" class="bg-green-600 text-white px-4 py-2 mt-3 rounded hover:bg-green-700">
            Save Evaluation
         </button>
      </form>
   </div>
</x-app-layout>