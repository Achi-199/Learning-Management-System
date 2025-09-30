<x-app-layout>
   <div class="max-w-4xl mx-auto py-8">
      <h1 class="text-3xl font-bold mb-4">{{ $subject->name }}</h1>

      <div class="mb-6">
         <p><strong>Description:</strong> {{ $subject->description }}</p>
         <p><strong>Code:</strong> {{ $subject->code }}</p>
         <p><strong>Credits:</strong> {{ $subject->credits }}</p>
         <p><strong>Created At:</strong> {{ $subject->created_at->format('Y-m-d H:i') }}</p>
         <p><strong>Last Updated:</strong> {{ $subject->updated_at->format('Y-m-d H:i') }}</p>
         <p><strong>Student Count:</strong> {{ $subject->students->count() }}</p>
      </div>
      <div class="flex items-center space-x-4 mb-4">
         <a href="{{ route('teacher.subjects.edit', $subject->id) }}"
            class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-500">
            Edit Subject
         </a>

         <form action="{{ route('teacher.subjects.destroy', $subject->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this subject?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
               Delete Subject
            </button>
         </form>
      </div>

      <a href="{{ route('teacher.tasks.create', ['subject_id' => $subject->id]) }}"
         class="inline-block mb-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
         Create New Task
      </a>



      <h2 class="text-xl font-semibold mb-2">Enrolled Students</h2>



      <table class="table-auto w-full bg-white">
         <thead>
            <tr>
               <th class="px-4 py-2">Name</th>
               <th class="px-4 py-2">Email</th>
            </tr>
         </thead>
         <tbody>
            @forelse ($subject->students as $student)
            <tr>
               <td class="border px-4 py-2">{{ $student->name }}</td>
               <td class="border px-4 py-2">{{ $student->email }}</td>
            </tr>
            @empty
            <tr>
               <td colspan="2" class="border px-4 py-2 text-center">No students enrolled.</td>
            </tr>
            @endforelse
         </tbody>
      </table>

      @if($subject->tasks && $subject->tasks->count())
      <h2 class="text-xl font-semibold mt-8 mb-2">Tasks</h2>
      <table class="table-auto w-full bg-white">
         <thead>
            <tr>
               <th class="px-4 py-2">Name</th>
               <th class="px-4 py-2">Points</th>
            </tr>
         </thead>
         <tbody>
            @foreach($subject->tasks as $task)
            <tr>
               <td class="border px-4 py-2">
                  <a href="{{ route('teacher.tasks.show', $task->id) }}" class="text-blue-400 underline">
                     {{ $task->title }}
                  </a>
               </td>


               <td class="border px-4 py-2">{{ $task->points }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
      @else
      <p class="mt-4 text-gray-600">No tasks created for this subject yet.</p>
      @endif

   </div>
</x-app-layout>