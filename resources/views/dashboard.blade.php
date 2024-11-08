<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-green-600">Завершённых задач</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$todos->where('completed',true)->count()}}</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-red-600">Незавершённых задач</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$todos->where('completed',false)->count()}}</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base/7 text-gray-600">Всего задач</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{$todos->count()}}</dd>
                </div>
            </dl>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-900">
                            <thead class="text-xs uppercase bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Задача
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Дата создания
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Статус
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($todos as $todo)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{$todo->title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$todo->created_at->format('d.m.Y')}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($todo->completed)
                                            <span class="bg-green-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded">Завершённая</span>
                                        @else
                                            <span class="bg-red-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded">Незавершённая</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <form action="{{ route('to-do.complete', $todo) }}" method="POST"
                                                  onsubmit="return confirm('Вы уверены, что хотите завершить задачу?')">
                                                @csrf
                                                @method('POST')
                                                <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Завершить задачу
                                                </button>
                                            </form>
                                            <a href="{{ route('to-do.edit', $todo) }}"
                                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Редактировать
                                            </a>
                                            <form action="{{ route('to-do.destroy', $todo) }}" method="POST"
                                                  onsubmit="return confirm('Вы уверены, что хотите удалить?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
