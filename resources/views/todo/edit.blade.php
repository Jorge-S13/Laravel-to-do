<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('to-do.update',$todo) }}">
            @csrf
            @method('patch')
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Название</label>
            <input type="text" name="title"
                   class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm/6"
                   placeholder="Введите название задачи"
                   value="{{ old('title',$todo->title) }}">
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <label for="description" class="block text-sm/6 font-medium text-gray-900">Описание</label>
            <textarea
                name="description"
                placeholder="{{ __('Здесь вы можете добавить описание к задаче.') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('description',$todo->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Изменить') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
