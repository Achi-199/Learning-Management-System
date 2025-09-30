<x-app-layout>
   <div class="max-w-4xl mx-auto py-8">
      <h1 class="text-3xl font-bold mb-4">{{ $subject->name }}</h1>

      <p><strong>Description:</strong> {{ $subject->description }}</p>
      <p><strong>Code:</strong> {{ $subject->code }}</p>
      <p><strong>Credits:</strong> {{ $subject->credits }}</p>
      <p><strong>Created At:</strong> {{ $subject->created_at->format('Y-m-d H:i') }}</p>
      <p><strong>Last Updated:</strong> {{ $subject->updated_at->format('Y-m-d H:i') }}</p>
      <p><strong>Student Count:</strong> {{ $subject->students->count() }}</p>
      <p><strong>Teacher:</strong> {{ $subject->teacher->name }} ({{ $subject->teacher->email }})</p>

      <h2 class="text-xl font-semibold mt-6 mb-2">Enrolled Students</h2>
      <table class="table-auto w-full bg-white">
         <thead>
            <tr>
               <th class="px-4 py-2">Name</th>
               <th class="px-4 py-2">Email</th>
            </tr>
         </thead>
         <tbody>
            @foreach($subject->students as $student)
            <tr>
               <td class="border px-4 py-2">{{ $student->name }}</td>
               <td class="border px-4 py-2">{{ $student->email }}</td>
            </tr>
            @endforeach
         </tbody>
      </table>

      <h2 class="text-xl font-semibold mt-8 mb-2">Tasks</h2>

      @if($subject->tasks->isEmpty())
      <p class="text-gray-600">No tasks available for this subject.</p>
      @else

      <table class="table-auto w-full bg-white border border-gray-300">
         <thead>
            <tr>
               <th class="border px-4 py-2">Name</th>
               <th class="border px-4 py-2">Points</th>
               <th class="border px-4 py-2">Submitted</th>
            </tr>
         </thead>
         <tbody>
            @foreach($subject->tasks as $task)
            <tr>
               <td class="border px-4 py-2">
                  <a href="{{ route('student.tasks.show', $task->id) }}" class="text-blue-600 underline">
                     {{ $task->title }}
                  </a>
               </td>
               <td class="border px-4 py-2">{{ $task->points }}</td>
               <td class="border px-4 py-2">
                  {{ Auth::user()->solutions->contains('task_id', $task->id) ? 'Yes' : 'No' }}
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      @endif

      <a href="{{ route('student.home') }}" class="inline-block mt-4 text-blue-600 hover:underline">
         ← Back to My Subjects
      </a>
   </div>
</x-app-layout>